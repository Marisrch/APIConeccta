<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }


	//BD EXEMPLOS
	
	/*function createHero($name, $realname, $rating, $teamaffiliation){
		$stmt = $this->con->prepare("INSERT INTO heroes (name, realname, rating, teamaffiliation) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $realname, $rating, $teamaffiliation);
		if($stmt->execute())
			return true; 
		return false; 
	}*/
	function cadastrarEmpresa($cnpj_empresa,$nome_empresa,$email_empresa,$local_empresa,$porte_empresa){
		$stmt = $this->con->prepare("INSERT INTO tbEmpresa(cnpj_empresa,nome_empresa,email_empresa,local_empresa,porte_empresa)VALUES (?,?,?,?,?)");
		$stmt->bind_param("sssss", $cnpj_empresa,$nome_empresa,$email_empresa,$local_empresa,$porte_empresa);
		if($stmt->execute())
			return true; 
		return false; 
	}
	function cadastrarCandidato($cpf_candidato, $nome_candidato, $telefone_candidato, $email_candidato, $local_candidato, $data_nasc_candidato,$estado_civil_candidato){
		$stmt = $this->con->prepare("INSERT INTO tbCandidato (cpf_candidato, nome_candidato, telefone_candidato, email_candidato, local_candidato, data_nasc_candidato, estado_civil_candidato) 
		VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssss", $cpf_candidato, $nome_candidato, $telefone_candidato, $email_candidato, $local_candidato, $data_nasc_candidato,$estado_civil_candidato);
		if($stmt->execute())
			return true; 
		return false; 

	}
	function cadastrarVagas ($nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas){
		$stmt = $this->con->prepare("INSERT INTO tbVagas(nome_vagas, local_vagas, descricao_vagas, requisitos_vagas, salario_vagas, vinculo_vagas, ramo_vagas) 
		VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssss", $nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas);
		if($stmt->execute())
			return true; 
		return false; 

	}	
	function cadastrarCurriculo ($descricao_curriculo, $exper_profissional_curriculo, $exper_academico_curriculo, $certificados_curriculo, $endereco_curriculo){
		$stmt = $this->con->prepare("INSERT INTO tbCurriculo (descricao_curriculo, exper_profissional_curriculo, exper_academico_curriculo, certificados_curriculo, endereco_curriculo) 
		VALUES(?,?,?,?,?)");
		$stmt->bind_param("sssss", $descricao_curriculo, $exper_profissional_curriculo, $exper_academico_curriculo, $certificados_curriculo, $endereco_curriculo);
		if($stmt->execute())
			return true; 
		return false; 

	}
// EXEMPLO
	
		/*function getHeroes(){
		$stmt = $this->con->prepare("SELECT id, name, realname, rating, teamaffiliation FROM heroes");
		$stmt->execute();
		$stmt->bind_result($id, $name, $realname, $rating, $teamaffiliation);
		$heroes = array(); 
		while($stmt->fetch()){
			$hero  = array();
			$hero['id'] = $id; 
			$hero['name'] = $name; 
			$hero['realname'] = $realname; 
			$hero['rating'] = $rating; 
			$hero['teamaffiliation'] = $teamaffiliation; 
			array_push($heroes, $hero); 
		}
		return $heroes; 
	}
*/

//BC CONECCTA
	
	function getcadastrarEmpresa(){
		$stmt = $this->con->prepare("SELECT id_empresa, cnpj_empresa,nome_empresa,email_empresa,local_empresa,porte_empresa FROM tbEmpresa");
		$stmt->execute();
		$stmt->bind_result($id_empresa, $cnpj_empresa,$nome_empresa,$email_empresa,$local_empresa,$porte_empresa);
		$tbEmpresa = array();
		while($stmt->fetch()){
			$cadastrarEmpresa  = array();
			$cadastrarEmpresa['id_empresa'] = $id_empresa;
			$cadastrarEmpresa['cnpj_empresa'] = $cnpj_empresa; 
			$cadastrarEmpresa['nome_empresa'] = $nome_empresa; 
			$cadastrarEmpresa['email_empresa'] = $email_empresa; 
			$cadastrarEmpresa['local_empresa'] = $local_empresa; 
			$cadastrarEmpresa['porte_empresa'] = $porte_empresa;
		
			array_push($tbEmpresa, $cadastrarEmpresa); 
		}
		
		return $tbEmpresa; 
	}

	function getcadastrarCandidato(){
		$stmt = $this->con->prepare("SELECT id_candidato, cpf_candidato, nome_candidato, telefone_candidato, email_candidato, local_candidato, data_nasc_candidato, estado_civil_candidato FROM tbCandidato");
		$stmt->execute();
		$stmt->bind_result($id_candidato, $cpf_candidato,  $nome_candidato, $telefone_candidato, $email_candidato, $local_candidato, $data_nasc_candidato,$estado_civil_candidato);
		$tbCandidato = array();
		while($stmt->fetch()){
			$cadastrarCandidato= array();
			$cadastrarCandidato['id_candidato'] = $id_candidato;
			$cadastrarCandidato['cpf_candidato'] = $cpf_candidato; 
			$cadastrarCandidato['nome_candidato'] = $nome_candidato; 
			$cadastrarCandidato['telefone_candidato'] = $telefone_candidato; 
			$cadastrarCandidato['local_candidato'] = $local_candidato; 
			$cadastrarCandidato['data_nasc_candidato'] = $data_nasc_candidato;
			$cadastrarCandidato['estado_civil_candidato'] = $estado_civil_candidato
			array_push($tbCandidato, $cadastrarCandidato); 
		}
		return $tbCandidato; 
	}

	function getcadastrarVagas(){
		$stmt = $this->con->prepare("SELECT id_vagas, nome_vagas, local_vagas, descricao_vagas, requisitos_vagas, salario_vagas, vinculo_vagas, ramo_vagas FROM tbVagas");
		$stmt->execute();
		$stmt->bind_result($id_vagas, $nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas);
		$tbVagas = array();
		while($stmt->fetch()){
			$cadastrarVagas  = array();
			$cadastrarVagas['id_vagas'] = $id_vagas; 
			$cadastrarVagas['nome_vagas'] = $nome_vagas; 
			$cadastrarVagas['local_vagas'] = $realname; 
			$cadastrarVagas['descricao_vagas'] = $descricao_vagas; 
			$cadastrarVagas['requisitos_vagas'] = $requisitos_vagas;
			$cadastrarVagas['salario_vagas'] = $salario_vagas;
			$cadastrarVagas['vinculo_vagas'] = $vinculo_vagas;
			$cadastrarVagas['ramo_vagas'] = $ramo_vagas;
			array_push($tbVagas, $cadastrarVagas); 
		}
		
		return $tbVagas; 
	}
	

	function getcadastrarCurriculo(){
		$stmt = $this->con->prepare("SELECT id_curriculo, descricao_curriculo, exper_profissional_curriculo, exper_academico_curriculo, certificados_curriculo, endereco_curriculo FROM tbCurriculo");
		$stmt->execute();
		$stmt->bind_result($id_curriculo, $descricao_curriculo, $exper_profissional_curriculo, $exper_academico_curriculo, $certificados_curriculo, $endereco_curriculo);
		$tbCurriculo = array();
		while($stmt->fetch()){
			$cadastrarCurriculo  = array();
			$cadastrarCurriculo['id_curriculo'] = $id_curriculo;
			$cadastrarCurriculo['descricao_curriculo'] = $descricao_curriculo; 
			$cadastrarCurriculo['exper_profissional_curriculo'] = $exper_profissional_curriculo; 
			$cadastrarCurriculo['exper_academico_curriculo'] = $exper_academico_curriculo; 
			$cadastrarCurriculo['certificados_curriculo'] = $certificados_curriculo; 
			$cadastrarCurriculo['endereco_curriculo'] = $endereco_curriculo;
			
		
			array_push($tbCurriculo, $cadastrarCurriculo); 
		}
		
		return $tbCurriculo; 
	}

	
	
//BD EXEMPLO

	/*function updateHero($nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas){
		$stmt = $this->con->prepare("UPDATE heroes SET name = ?, realname = ?, rating = ?, teamaffiliation = ? WHERE id = ?");
		$stmt->bind_param("ssisi", $name, $realname, $rating, $teamaffiliation, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}*/

//BC CONECCTA
	

	function updatecadastrarEmpresa($id_empresa, $cnpj_empresa,$nome_empresa,$email_empresa,$local_empresa,$porte_empresa){
		$stmt = $this->con->prepare("UPDATE tbEmpresa SET cnpj_empresa = ?, nome_empresa = ?, email_empresa = ?, local_empresa = ?, porte_empresa = ?WHERE id_empresa = ?");
		$stmt->bind_param("sssssi",$cnpj_empresa,$nome_empresa,$email_empresa,$local_empresa,$porte_empresa, $id_empresa);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function updatecadastrarCandidato(($id_candidato, $cpf_candidato,  $nome_candidato, $telefone_candidato, $email_candidato, $local_candidato, $data_nasc_candidato,$estado_civil_candidato){
		$stmt = $this->con->prepare("UPDATE tbCandidato SET cpf_candidato = ?, nome_candidato = ?, telefone_candidato = ?, email_candidato = ?,local_candidato = ?, data_nasc_candidato = ?, estado_civil_candidato = ? WHERE id_candidato = ?");
		$stmt->bind_param("sssssssi",$id_candidato, $cpf_candidato,  $nome_candidato, $telefone_candidato, $email_candidato, $local_candidato, $data_nasc_candidato,$estado_civil_candidato);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function updatecadastrarVagas($id_vagas, $nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas){
		$stmt = $this->con->prepare("UPDATE tbVagas SET nome_vagas = ?, local_vagas = ?, descricao_vagas = ?, requisitos_vagas = ?, salario_vagas = ?, vinculo_vagas = ?, ramo_vagas = ?  WHERE id_vagas = ?");
		$stmt->bind_param("sssssssi", $nome_vagas, $local_vagas, $descricao_vagas, $requisitos_vagas, $salario_vagas, $vinculo_vagas, $ramo_vagas, $id_vagas);
		if($stmt->execute())
			return true; 
		return false; 
	}
	function updatecadastrarCurriculo(($id_curriculo, $descricao_curriculo, $exper_profissional_curriculo, $exper_academico_curriculo, $certificados_curriculo, $endereco_curriculo){
		$stmt = $this->con->prepare("UPDATE tbCurriculo SET descricao_curriculo = ?, exper_profissional_curriculo = ?, exper_academico_curriculo = ?, certificados_curriculo = ?,endereco_curriculo = ? WHERE id_curriculo = ?");
		$stmt->bind_param("sssssi", $id_curriculo, $descricao_curriculo, $exper_profissional_curriculo, $exper_academico_curriculo, $certificados_curriculo, $endereco_curriculo);
		if($stmt->execute())
			return true; 
		return false; 
	}
	

	//BD EXEMPLO

	/*function deleteHero($id){
		$stmt = $this->con->prepare("DELETE FROM heroes WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		
		return false; 
	} */



	function deletecadastrarEmpresa($id_empresa){
		$stmt = $this->con->prepare("DELETE FROM tbEmpresa WHERE id_empresa = ? ");
		$stmt->bind_param("i", $id_empresa);
		if($stmt->execute())
			return true; 
		return false; 
	}
		function deletecadastrarCandidato($id_candidato){
		$stmt = $this->con->prepare("DELETE FROM tbCandidato WHERE id_candidato = ? ");
		$stmt->bind_param("i", $id_candidato);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function deletecadastrarVagas($id_vagas){
		$stmt = $this->con->prepare("DELETE FROM tbVagas WHERE id_vagas = ? ");
		$stmt->bind_param("i", $id_vagas);
		if($stmt->execute())
			return true; 
		return false; 
	
	}
	function deletecadastrarCurriculo($id_curriculo){
		$stmt = $this->con->prepare("DELETE FROM tbCurriculo WHERE id_curriculo = ? ");
		$stmt->bind_param("i", $id_curriculo);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
}


