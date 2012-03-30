<?php
/**
 * Description
 *
 *
 *
 * @author Marcus Paulo Mazzon Dias
 * @version  1.0.0
 */
require_once (dirname(__FILE__) . '/../configs.php');

class DBASE extends mysqli {

	private $_table;
	private $_query;
	private $_campos = '*';
	private $_limit = null;
	private $_limitQtd;
	private $_sql;
	private $_data;
	private $_last_id;
	private $_order_field;
	private $_order_sort;
	private $_debug = false;
	private $_schema;
	private $_log;
	private $_log_max = 5;
	private $_error;

	public function __construct($log = false) {
		parent::__construct(_HOST_, _LOGIN_, _PASSWORD_, _SCHEMA_);

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}

		$this -> _log = $log;

	}

	public function execute($action) {
		switch (strtolower($action)) {
			case 'c' :
			case 'insert' :
				return $this -> create();
				break;
			case 'd' :
			case 'delete' :
				return $this -> delete();
				break;
			case 'r' :
			case 'select' :
				return $this -> read();
				break;
			case 'u' :
			case 'update' :
				return $this -> update();
				break;
		}
	}

	/**
	 * funcao para inserir um novo registro, e executa pelo
	 * execute(c) ou execute (insert)
	 * ex:  $db = new DBase()
	 * 		$reposta = $db 	-> table ('tabela')
	 * 						-> data (array('campo1' => 1, 'campo1' => $teste))
	 * 						-> execute ('insert');
	 */
	private function create() {
		if (empty($this -> _data)) {
			$this -> _error = 'Nenhum dado enviado';
			return false;
		}

		if (empty($this -> _table)) {
			$this -> _error = 'Nenhuma tabela foi selecionada';
			return false;
		}

		if (!$retorno = $this -> makeInsertSQL($fields, $values)) {
			$this -> _error = 'erro ao separar os campos do sql';
		}

		$sql = 'INSERT INTO `' . $this -> _table . '` (' . $fields . ') VALUES (' . $values . ')';
		if ($this -> _debug) {
			echo $sql;
		}

		if ($result = parent::query($sql)) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			$this -> _last_id = $this -> insert_id;
			return TRUE;
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return FALSE;
		}
	}

	/**
	 * funcao para ler um registro ou varios, e executa pelo
	 * execute(r) ou execute (select)
	 * ex:  $db = new DBase()
	 * 		$reposta = $db 	-> table ('tabela')
	 * 						-> query ('campo1 = "10" and campo2 = "20"')
	 * 						-> order ('campo1', 'DESC')
	 * 						-> limit ('0','1')
	 * 						-> execute ('select');
	 */
	private function read() {
		if (!empty($this -> _query))
			$this -> _query = ' WHERE ' . $this -> _query;

		if (!empty($this -> _order_field))
			$this -> _order_field = ' ORDER ' . $this -> _order_field . ' ' . $this -> _order_sort;

		if (!is_null($this -> _limit))
			$this -> _limit = ' LIMIT ' . $this -> _limit . ', ' . $this -> _limitQtd;

		$sql = 'SELECT ' . $this -> _campos . ' FROM `' . $this -> _table . '`' . $this -> _query . $this -> _order_field . $this -> _limit;

		if ($this -> _debug)
			echo $sql;

		if ($result = parent::query($sql)) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			if ($result -> num_rows) {
				$dados = new ArrayObject();
				while ($row = $result -> fetch_assoc()) {
					$dados[] = $row;
				}
				return $dados;
			}
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return false;
		}
	}

	/**
	 * funcao para fazer update no sistema
	 * execute(u) ou execute (update)
	 * ex:  $db = new DBase()
	 * 		$reposta = $db 	-> table ('tabela')
	 * 						-> data ('campo1 = "1" and campo2 = "2345"')
	 * 						-> query ('campo1 = "10" and campo2 = "20"')
	 * 						-> execute ('update');
	 */
	private function update() {
		if (empty($this -> _data)) {
			$this -> _error = 'Nenhum dado enviado';
			return false;
		}

		if (!empty($this -> _query))
			$this -> _query = ' WHERE ' . $this -> _query;

		if (!$retorno = $this -> makeUpdateSQL($fields)) {
			$this -> _error = 'erro ao separar os campos do sql';
		}

		if (empty($this -> _table)) {
			$this -> _error = 'Nenhuma tabela foi selecionada';
			return false;
		}

		$sql = 'UPDATE `' . $this -> _table . '` SET ' . $fields . $this -> _query;

		if ($this -> _debug) {
			echo $sql;
		}

		if ($result = parent::query($sql)) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			return TRUE;
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return FALSE;
		}

	}

	/**
	 * funcao para deletar um registro ou varios, e executa pelo
	 * execute(d) ou execute (delete)
	 * ex:  $db = new DBase()
	 * 		$reposta = $db 	-> table ('tabela')
	 * 						-> query ('campo1 = "10" and campo2 = "20"')
	 * 						-> order ('campo1', 'ASC')
	 * 						-> limit ('0','10')
	 * 						-> execute ('delete');
	 *
	 */
	private function delete() {
		if (!empty($this -> _query)) {
			$this -> _query = ' WHERE ' . $this -> _query;
		} else {
			$this -> _error = 'Para sua segurança, não se pode fazer um delete sem condição, para isso utilize o truncate';
			return FALSE;
		}
		if (!empty($this -> _order_field))
			$this -> _order_field = ' ORDER ' . $this -> _order_field . ' ' . $this -> _order_sort;

		if (!is_null($this -> _limit))
			$this -> _limit = ' LIMIT ' . $this -> _limit . ', ' . $this -> _limitQtd;

		$sql = 'DELETE FROM `' . $this -> _table . '`' . $this -> _query . $this -> _order_field . $this -> _limit;

		if ($this -> _debug) {
			echo $sql;
		}

		if (parent::query($sql) === true) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			return true;
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return false;
		}
	}

	/**
	 * funcao utilizada para separa o array assoc enviado e gerar campos e valores da query
	 */
	private function makeInsertSQL(&$fields, &$values) {
		$fields = '';
		$values = '';
		$i = 0;
		foreach ($this->_data as $key => $value) {
			$fields .= "`" . $key . "`";
			$values .= $this -> treatValue($value);

			if ($i < count($this -> _data) - 1) {
				$fields .= ',';
				$values .= ',';
			}
			$i++;
		}

		return TRUE;
	}

	/**
	 * funcao utilizada para separa o array assoc enviado e gerar campos e valores da query
	 */
	private function makeUpdateSQL(&$fields) {
		$fields = '';
		$i = 0;
		foreach ($this->_data as $key => $value) {
			if (!is_null($value)) {
				$fields .= "`" . $key . "` = ";
				$fields .= $this -> treatValue($value);

				if ($i < count($this -> Data) - 1)
					$fields .= ',';

			}
			$i++;
		}

		return TRUE;
	}

	/**
	 * Funcao para dar escape nos campos, a menos que seja um campo para chamar uma funcao.
	 */

	private function treatValue($value) {
		$fields = '';
		if (is_array($value)) {
			if (!isset($value[1]))
				return FALSE;

			switch($value[0]) {
				case 'function' :
					$fields .= $value[1];
					break;
				default :
					$fields .= "'" . $this -> real_escape_string($value[1]) . "'";
					break;
			}
		} else {
			$fields .= "'" . $this -> real_escape_string($value) . "'";
		}

		return $fields;
	}

	/**
	 * Executar uma query com retorno de varios registros em um array associativo.
	 * ex: $sql = "select campo1, campo2 from table where campo < 10"
	 */

	public function executeSelectsSql($sql) {
		if ($this -> _debug) {
			echo $sql;
		}

		if ($result = parent::query($sql)) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			if ($result -> num_rows) {
				$dados = new ArrayObject();
				while ($row = $result -> fetch_assoc()) {
					$dados[] = $row;
				}
				return $dados;
			}
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return false;
		}

	}

	/**
	 * Para executar um sql já pronto, serve para insert, update e delete
	 * ex: $sql = "update table set campo = campo+1 where campo < 10"
	 *
	 */
	public function executeSql($sql) {
		if ($this -> _debug) {
			echo $sql;
		}

		if (parent::query($sql) === true) {
			if ($this -> _log) {
				$this -> logSql($sql);
			}
			return true;
		} else {
			$this -> _error = $this -> errno . ' ' . $this -> error . ' ' . $sql;
			return false;
		}

	}

	/**
	 * Metodo para criacao do log
	 * Log: para ativar o log é necessario que no config você defina aonde ira gravar
	 * ex: 	@define(_LOG_, serialize(array('BD','tabela'))); irá salvar no banco de dados na tabela log
	 *      caso sejá banco de dados estrutura da tabela
	 *
	 * 		CREATE  TABLE IF NOT EXISTS `log` (
	 * 				`idlog` INT NOT NULL ,
	 * 				`sql` TEXT NULL ,
	 * 				`criado` DATETIME NULL ,
	 * 		PRIMARY KEY (`idlog`) )
	 *
	 * 		@define(_LOG_, serialize(array('FILE','pasta','nomeBasedoArquivo'))) irá salvar em um arquivo txt);
	 * 		OBS: caso na exista a pasta será criada automaticamente, alterar o htacess a pasta nao ficar
	 * 			 disponivel a acesso externo. Alterar o htacess para bloquear o acesso externo.
	 * 			 o log em arquivo e separado por data para nao ocupar muito espaço
	 */

	private function logSql($sql) {
		$logConfig = unserialize(_LOG_);
		switch ($logConfig[0]) {
			case 'DB' :
				break;
			case 'FILE' :
				if (!$this -> existeDiretorio($logConfig[1])) {
					$this -> _error[] = 'O log não foi criado, favor verificar permissões e own da pasta.';
					return false;
				}
				$nomeArquivo = $this -> configArquivo($logConfig[1], $logConfig[2]);
				$file = fopen($nomeArquivo, "a+");
				$escreve = fwrite($file, "/* " . date("Y-m-d H:i:s") . " */ " . $sql . chr(13));
				fclose($file);
				break;
			default :
				$this -> _error[] = 'Configuração dos logs está errado.';
				break;
		}
	}

	/**
	 * Verifica se exite diretorio, e muda a permissao para acesso total
	 */
	private function existeDiretorio($dir) {
		if (file_exists($dir)) {
			chmod($dir, '0777');
			return true;
		} else {
			mkdir($dir);
			chmod($dir, '0777');
			return true;
		}
	}

	/**
	 * verifica se existe o arquivo e caso seja maior que o estipulado e criado um novo
	 * para evitar que o sistema de log fique lento.
	 */
	private function configArquivo($dir, $arquivo) {
		$tamanho = 1048576 * $this -> _log_max;
		$nomeArquivo = $dir . '/' . $arquivo . ' ' . date("Y-m-d") . '.txt';
		if (file_exists($nomeArquivo)) {
			$aux = round(filesize($nomeArquivo) / $tamanho);
			if ($aux > 1)
				$nomeArquivo = $dir . '/' . $arquivo . $aux . ' ' . date("Y-m-d") . '.txt';
			return $nomeArquivo;
		} else {
			return $nomeArquivo;
		}
	}

	/**
	 * Metodos para criacao do sql
	 */

	public function table($table) {
		$this -> _table = $table;
		return $this;
	}

	public function query($query) {
		$this -> _query = $query;
		return $this;
	}

	public function campos($campos) {
		if (is_array($campos)) {
			foreach ((array)$campos as $key) {
				if (!empty($this -> _campos))
					$this -> _campos = ', `' . $key . '`';
				else
					$this -> _campos = '`' . $key . '`';
			}
			return $this;
		} else {
			$this -> _campos = $campos;
			return $this;
		}
	}

	public function limit($inicio = null, $fim = null) {
		$this -> _limit = $inicio;
		$this -> _limitQtd = $fim;
		return $this;
	}

	public function sql($sql) {
		$this -> _sql = $sql;
		return $this;
	}

	public function data($data) {
		$this -> _data = $data;
		return $this;
	}

	public function order($field, $sort = 'ASC') {
		$this -> _order_field = $field;
		$this -> _order_sort = $sort;
		return $this;
	}

	public function schema($schema) {
		$this -> _schema = $schema;
		return $this;
	}

	public function debug($debug) {
		$this -> _debug = $debug;
		return $this;
	}

	public function getLastId() {
		return $this -> _last_id;
	}

}
?>