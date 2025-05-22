<?php 

	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	
	// ESTRUTURA API EMPRESA
	if (isset($_GET['apicall'])) {
		switch ($_GET['apicall']) {
			case 'cadastrarEmpresa':
				isTheseParametersAvailable(
				array('cnpj_empresa','nome_empresa','email_empresa','local_empresa','porte_empresa'))
				$db = new DbOperation();

				$result = $db->cadastrarEmpresa(
					$_POST['cnpj_empresa'],
					$_POST['nome_empresa'],
					$_POST['email_empresa'],
					$_POST['local_empresa'],
					$_POST['porte_empresa']
				);

				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'GET adicionado com sucesso';

					
					$response['tbEmpresa'] = $db->getcadastrarEmpresa();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				

						break;
					
				
			
			

		
			case 'getcadastrarEmpresa':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbEmpresa'] = $db->getcadastrarEmpresa();
			break;
 
			
			
		
			case 'updatecadastrarEmpresa':
				isTheseParametersAvailable(array('cnpj_empresa','nome_empresa','email_empresa','local_empresa','porte_empresa'));
				$db = new DbOperation():
				$result = $db->updatecadastrarEmpresa(
					$_POST['cnpj_empresa'],
					$_POST['nome_empresa'],
					$_POST['email_empresa'],
					$_POST['local_empresa'],
					$_POST['porte_empresa']
				);

				if ($result) {
					$response ['error'] = false;
					$response['message'] = 'Herói atualizado com sucesso';
					$response['heroes'] = $db->getcadastrarEmpresa();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break;
			
			
			case 'deleteempresa':

				
				if(isset($_GET['id_empresa'])){
					$db = new DbOperation();
					if($db->deleteEmpresa($_GET['id_empresa'])){
						$response['error'] = false; 
						$response['message'] = 'Herói excluído com sucesso';
						$response['tbEmpresa'] = $db->getcadastrarEmpresa();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}

	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}

		// ESTRUTURA API CANDIDATO
	if (isset($_GET['apicall'])) {
		switch ($_GET['apicall']) {
			case 'cadastrarCandidato':
				isTheseParametersAvailable(
				array('cpf_candidato', 'nome_candidato', 'telefone_candidato', 'email_candidato', 'local_candidato', 'data_nasc_candidato', 'estado_civil_candidato'))
				$db = new DbOperation();

				$result = $db->cadastrarCandidato(
					$_POST['cpf_candidato'],
					$_POST['nome_candidato'],
					$_POST['telefone_candidato'],
					$_POST['email_candidato'],
					$_POST['local_candidato'],
					$_POST['data_nasc_candidato'],
					$_POST['estado_civil_candidato']
				);

				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'GET adicionado com sucesso';

					
					$response['tbCandidato'] = $db->getcadastrarCandidato();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				

						break;

				case 'getcadastrarCandidato':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbCandidato'] = $db->getcadastrarCandidato();
				break;

				case 'updatecadastrarCandidato':
				isTheseParametersAvailable(array('cpf_candidato', 'nome_candidato', 'telefone_candidato', 'email_candidato', 'local_candidato', 'data_nasc_candidato', 'estado_civil_candidato'));
				$db = new DbOperation():
				$result = $db->updatecadastrarCandidato(
					$_POST['cpf_candidato'],
					$_POST['nome_candidato'],
					$_POST['telefone_candidato'],
					$_POST['email_candidato'],
					$_POST['local_candidato'],
					$_POST['data_nasc_candidato'],
					$_POST['estado_civil_candidato']
				);

				if ($result) {
					$response ['error'] = false;
					$response['message'] = 'Herói atualizado com sucesso';
					$response['heroes'] = $db->updatecadastrarCandidato();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				break;


				case 'deletecandidato':

				
				if(isset($_GET['id_candidato'])){
					$db = new DbOperation();
					if($db->deleteEmpresa($_GET['id_candidato'])){
						$response['error'] = false; 
						$response['message'] = 'Herói excluído com sucesso';
						$response['tbCandidato'] = $db->getcadastrarCandidato();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break;
 		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}

	// ESTRUTURA API VAGAS
	if (isset($_GET['apicall'])) {
		switch ($_GET['apicall']) {
			case 'cadastrarVagas':
				isTheseParametersAvailable(
				array('nome_vagas', 'local_vagas', 'descricao_vagas', 'requisitos_vagas', 'salario_vagas', 'vinculo_vagas', 'ramo_vagas'))
				$db = new DbOperation();

				$result = $db->cadastrarVagas(
					$_POST['nome_vagas'],
					$_POST['local_vagas'],
					$_POST['descricao_vagas'],
					$_POST['requisitos_vagas'],
					$_POST['salario_vagas'],
					$_POST['vinculo_vagas'],
					$_POST['ramo_vagas']
				);

				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'GET adicionado com sucesso';

					
					$response['tbVagas'] = $db->getcadastrarVagas();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				

				break;

				case 'getcadastrarVagas':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbVagas'] = $db->getcadastrarVagas();
				break;

				case 'updatecadastrarVagas':
				isTheseParametersAvailable(array('nome_vagas', 'local_vagas', 'descricao_vagas', 'requisitos_vagas', 'salario_vagas', 'vinculo_vagas', 'ramo_vagas'));
				$db = new DbOperation():
				$result = $db->updatecadastrarVagas(
					$_POST['nome_vagas'],
					$_POST['local_vagas'],
					$_POST['descricao_vagas'],
					$_POST['requisitos_vagas'],
					$_POST['salario_vagas'],
					$_POST['vinculo_vagas'],
					$_POST['ramo_vagas']
				);

				if ($result) {
					$response ['error'] = false;
					$response['message'] = 'Herói atualizado com sucesso';
					$response['heroes'] = $db->updatecadastrarVagas();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				break;

				case 'deletevagas':

				
				if(isset($_GET['id_vagas'])){
					$db = new DbOperation();
					if($db->deleteVagas($_GET['id_vagas'])){
						$response['error'] = false; 
						$response['message'] = 'Herói excluído com sucesso';
						$response['tbVagas'] = $db->getcadastrarVagas();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
				break;
		}

	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}

	//ESTRUTURA API CURRICULO
	if (isset($_GET['apicall'])) {
		switch ($_GET['apicall']) {
			case 'cadastrarCurriculo':
				isTheseParametersAvailable(
				array('descricao_curriculo', 'exper_profissional_curriculo', 'exper_academico_curriculo', 'certificados_curriculo','endereco_curriculo'))
				$db = new DbOperation();

				$result = $db->cadastrarCurriculo(
					$_POST['descricao_curriculo'],
					$_POST['exper_profissional_curriculo'],
					$_POST['certificados_curriculo'],
					$_POST['exper_academico_curriculo'],
					$_POST['endereco_curriculo'],
				);

				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'GET adicionado com sucesso';

					
					$response['tbCurriculo'] = $db->getcadastrarCurriculo();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				

			break;

			case 'getcadastrarCurriculo':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['tbCandidato'] = $db->getcadastrarCurriculo();
			break;

			case 'updatecadastrarCurriculo':
				isTheseParametersAvailable(array('escricao_curriculo', 'exper_profissional_curriculo', 'exper_academico_curriculo', 'certificados_curriculo', 'endereco_curriculo'));
				$db = new DbOperation():
				$result = $db->updatecadastrarCurriculo(
					$_POST['descricao_curriculo'],
					$_POST['exper_profissional_curriculo'],
					$_POST['certificados_curriculo'],
					$_POST['exper_academico_curriculo'],
					$_POST['endereco_curriculo'],
				);

				if ($result) {
					$response ['error'] = false;
					$response['message'] = 'Herói atualizado com sucesso';
					$response['heroes'] = $db->updatecadastrarCurriculo();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				break;

				case 'deletecurriculo':

				
				if(isset($_GET['id_curriculo'])){
					$db = new DbOperation();
					if($db->deleteVagas($_GET['id_curriculo'])){
						$response['error'] = false; 
						$response['message'] = 'Herói excluído com sucesso';
						$response['tbCurriculo'] = $db->getcadastrarCurriculo();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break;
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}


	

	echo json_encode($response);