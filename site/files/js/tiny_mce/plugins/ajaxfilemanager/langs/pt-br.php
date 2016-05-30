<?php
	/**
	 * language pack
	 * @author Logan Cai (cailongqun [at] yahoo [dot] com [dot] cn)
	 * @link www.phpletter.com
	 * @since 22/April/2007
	 *
	 */
	define('DATE_TIME_FORMAT', 'd/M/Y H:i:s');
	//Common
	//Menu




	define('MENU_SELECT', 'Selecionar');
	define('MENU_DOWNLOAD', 'Download');
	define('MENU_PREVIEW', 'Visualização');
	define('MENU_RENAME', 'Renomear');
	define('MENU_EDIT', 'Editar');
	define('MENU_CUT', 'Recortar');
	define('MENU_COPY', 'Copiar');
	define('MENU_DELETE', 'Excluir');
	define('MENU_PLAY', 'Tocar');
	define('MENU_PASTE', 'Colar');

	//Label
		//Top Action
		define('LBL_ACTION_REFRESH', 'Atualizar');
		define('LBL_ACTION_DELETE', 'Excluir');
		define('LBL_ACTION_CUT', 'Recortar');
		define('LBL_ACTION_COPY', 'Copiar');
		define('LBL_ACTION_PASTE', 'Colar');
		define('LBL_ACTION_CLOSE', 'Fechar');
		define('LBL_ACTION_SELECT_ALL', 'Selecionar todos');
		//File Listing
	define('LBL_NAME', 'Nome');
	define('LBL_SIZE', 'Tamanho');
	define('LBL_MODIFIED', 'Modificado em');
		//File Information
	define('LBL_FILE_INFO', 'Info. do arquivo:');
	define('LBL_FILE_NAME', 'Nome:');
	define('LBL_FILE_CREATED', 'Criado:');
	define('LBL_FILE_MODIFIED', 'Modificado:');
	define('LBL_FILE_SIZE', 'Tamanho:');
	define('LBL_FILE_TYPE', 'Tipo:');
	define('LBL_FILE_WRITABLE', 'Escrita?');
	define('LBL_FILE_READABLE', 'Leitura?');
		//Folder Information
	define('LBL_FOLDER_INFO', 'Info. da pasta');
	define('LBL_FOLDER_PATH', 'Pasta:');
	define('LBL_CURRENT_FOLDER_PATH', 'Endereço atual:');
	define('LBL_FOLDER_CREATED', 'Criada:');
	define('LBL_FOLDER_MODIFIED', 'Modificada:');
	define('LBL_FOLDER_SUDDIR', 'Subpasta:');
	define('LBL_FOLDER_FIELS', 'Arquivos:');
	define('LBL_FOLDER_WRITABLE', 'Escrita?');
	define('LBL_FOLDER_READABLE', 'Leitura?');
	define('LBL_FOLDER_ROOT', 'Pasta raiz');
		//Preview
	define('LBL_PREVIEW', 'Visualização');
	define('LBL_CLICK_PREVIEW', 'Clique para visualizar.');
	//Buttons
	define('LBL_BTN_SELECT', 'Selecionar');
	define('LBL_BTN_CANCEL', 'Cancelar');
	define('LBL_BTN_UPLOAD', 'Upload');
	define('LBL_BTN_CREATE', 'Criar');
	define('LBL_BTN_CLOSE', 'Fechar');
	define('LBL_BTN_NEW_FOLDER', 'Nova pasta');
	define('LBL_BTN_NEW_FILE', 'Novo arquivo');
	define('LBL_BTN_EDIT_IMAGE', 'Editar');
	define('LBL_BTN_VIEW', 'Selecione exibir');
	define('LBL_BTN_VIEW_TEXT', 'Texto');
	define('LBL_BTN_VIEW_DETAILS', 'Detalhes');
	define('LBL_BTN_VIEW_THUMBNAIL', 'Miniaturas');
	define('LBL_BTN_VIEW_OPTIONS', 'Ver em:');
	//pagination
	define('PAGINATION_NEXT', 'Próximo');
	define('PAGINATION_PREVIOUS', 'Anterior');
	define('PAGINATION_LAST', 'Último');
	define('PAGINATION_FIRST', 'Primeiro');
	define('PAGINATION_ITEMS_PER_PAGE', 'Mostrando %s itens por página');
	define('PAGINATION_GO_PARENT', 'Subir nível');
	//System
	define('SYS_DISABLED', 'Permissão negada: O sistema está desativado.');

	//Cut
	define('ERR_NOT_DOC_SELECTED_FOR_CUT', 'Nenhum documento selecionado para recortar.');
	//Copy
	define('ERR_NOT_DOC_SELECTED_FOR_COPY', 'Nenhum documento selecionado para copiar.');
	//Paste
	define('ERR_NOT_DOC_SELECTED_FOR_PASTE', 'Nenhum documento selecionado para colar.');
	define('WARNING_CUT_PASTE', 'Tem certeza que deseja mover os arquivos selecionados?');
	define('WARNING_COPY_PASTE', 'Tem certeza que deseja copiar os arquivos selecionados?');
	define('ERR_NOT_DEST_FOLDER_SPECIFIED', 'Pasta de destino não especificada.');
	define('ERR_DEST_FOLDER_NOT_FOUND', 'Pasta de destino não encontrada.');
	define('ERR_DEST_FOLDER_NOT_ALLOWED', 'Você não tem permissão para mover arquivos para está pasta.');
	define('ERR_UNABLE_TO_MOVE_TO_SAME_DEST', 'Falha ao mover o arquivo (%s): A pasta de origem é igual a pasta de destino.');
	define('ERR_UNABLE_TO_MOVE_NOT_FOUND', 'Falha ao mover o arquivo (%s): A pasta de origem não existe.');
	define('ERR_UNABLE_TO_MOVE_NOT_ALLOWED', 'Falha ao mover o arquivo (%s): O arquivo está bloqueado.');

	define('ERR_NOT_FILES_PASTED', 'Nenhum arquivo foi colado.');

	//Search
	define('LBL_SEARCH', 'Busca');
	define('LBL_SEARCH_NAME', 'Completo/Nome parcial:');
	define('LBL_SEARCH_FOLDER', 'Veja em:');
	define('LBL_SEARCH_QUICK', 'Busca rápida');
	define('LBL_SEARCH_MTIME', 'Data de modificação(Série):');
	define('LBL_SEARCH_SIZE', 'Tamanho do arquivo:');
	define('LBL_SEARCH_ADV_OPTIONS', 'Opções avançadas');
	define('LBL_SEARCH_FILE_TYPES', 'Tipos de arquivos:');
	define('SEARCH_TYPE_EXE', 'Aplicações');

	define('SEARCH_TYPE_IMG', 'Imagem');
	define('SEARCH_TYPE_ARCHIVE', 'Arquivo');
	define('SEARCH_TYPE_HTML', 'HTML');
	define('SEARCH_TYPE_VIDEO', 'Video');
	define('SEARCH_TYPE_MOVIE', 'Vídeo');
	define('SEARCH_TYPE_MUSIC', 'Música');
	define('SEARCH_TYPE_FLASH', 'Flash');
	define('SEARCH_TYPE_PPT', 'PowerPoint');
	define('SEARCH_TYPE_DOC', 'Documento');
	define('SEARCH_TYPE_WORD', 'Word');
	define('SEARCH_TYPE_PDF', 'PDF');
	define('SEARCH_TYPE_EXCEL', 'Excel');
	define('SEARCH_TYPE_TEXT', 'Texto');
	define('SEARCH_TYPE_UNKNOWN', 'Indefinido');
	define('SEARCH_TYPE_XML', 'XML');
	define('SEARCH_ALL_FILE_TYPES', 'Todos os tipos');
	define('LBL_SEARCH_RECURSIVELY', 'Busca recursiva:');
	define('LBL_RECURSIVELY_YES', 'Sim');
	define('LBL_RECURSIVELY_NO', 'Não');
	define('BTN_SEARCH', 'Buscar');
	//thickbox
	define('THICKBOX_NEXT', 'Próximo&gt;');
	define('THICKBOX_PREVIOUS', '&lt;Anterior');
	define('THICKBOX_CLOSE', 'Fechar');
	//Calendar
	define('CALENDAR_CLOSE', 'Fechar');
	define('CALENDAR_CLEAR', 'limpar');
	define('CALENDAR_PREVIOUS', '&lt;Anterior');
	define('CALENDAR_NEXT', 'Próximo&gt;');
	define('CALENDAR_CURRENT', 'Hoje');
	define('CALENDAR_MON', 'Seg');
	define('CALENDAR_TUE', 'Ter');
	define('CALENDAR_WED', 'Qua');
	define('CALENDAR_THU', 'Qui');
	define('CALENDAR_FRI', 'Sex');
	define('CALENDAR_SAT', 'Sáb');
	define('CALENDAR_SUN', 'Dom');
	define('CALENDAR_JAN', 'Jan');
	define('CALENDAR_FEB', 'Fev');
	define('CALENDAR_MAR', 'Mar');
	define('CALENDAR_APR', 'Abr');
	define('CALENDAR_MAY', 'Mai');
	define('CALENDAR_JUN', 'Jun');
	define('CALENDAR_JUL', 'Jul');
	define('CALENDAR_AUG', 'Ago');
	define('CALENDAR_SEP', 'Set');
	define('CALENDAR_OCT', 'Out');
	define('CALENDAR_NOV', 'Nov');
	define('CALENDAR_DEC', 'Dez');
	//ERROR MESSAGES
		//deletion
	define('ERR_NOT_FILE_SELECTED', 'Selecione um arquivo.');
	define('ERR_NOT_DOC_SELECTED', 'Nenhum documento selecionado para excluir.');
	define('ERR_DELTED_FAILED', 'Não é possível excluir os documento(s) selecionado(s).');
	define('ERR_FOLDER_PATH_NOT_ALLOWED', 'O caminho da pasta não é permitido.');
		//class manager
	define('ERR_FOLDER_NOT_FOUND', 'Não foi possível localizar a pasta especificada: ');
		//rename
	define('ERR_RENAME_FORMAT', 'Por favor, dê-lhe um nome que contém apenas letras, números, espaço, hífen e underscore.');
	define('ERR_RENAME_EXISTS', 'Por favor, dê-lhe um nome que é único na pasta.');
	define('ERR_RENAME_FILE_NOT_EXISTS', 'O arquivo/pasta não existe.');
	define('ERR_RENAME_FAILED', 'Não é possível renomeá-lo, por favor tente novamente.');
	define('ERR_RENAME_EMPTY', 'Por favor, dê um nome.');
	define('ERR_NO_CHANGES_MADE', 'Nenhuma alteração foi feita.');
	define('ERR_RENAME_FILE_TYPE_NOT_PERMITED', 'Você não tem permissão para alterar a extensão do arquivo.');
		//folder creation
	define('ERR_FOLDER_FORMAT', 'Por favor, dê-lhe um nome que contém apenas letras, números, espaço, hífen e underscore.');
	define('ERR_FOLDER_EXISTS', 'Por favor, dê-lhe um nome que é único na pasta.');
	define('ERR_FOLDER_CREATION_FAILED', 'Não é possível criar uma pasta, por favor tente novamente.');
	define('ERR_FOLDER_NAME_EMPTY', 'Por favor, dê um nome.');
	define('FOLDER_FORM_TITLE', 'Formulário nova pasta');
	define('FOLDER_LBL_TITLE', 'Título da pasta:');
	define('FOLDER_LBL_CREATE', 'Criar pasta');
	//New File
	define('NEW_FILE_FORM_TITLE', 'Formulário novo arquivo');
	define('NEW_FILE_LBL_TITLE', 'Nome:');
	define('NEW_FILE_CREATE', 'Criar arquivo');
		//file upload
	define('ERR_FILE_NAME_FORMAT', 'Por favor, dê-lhe um nome que contém apenas letras, números, espaço, hífen e underscore.');
	define('ERR_FILE_NOT_UPLOADED', 'Nenhum arquivo foi selecionado para fazer o upload.');
	define('ERR_FILE_TYPE_NOT_ALLOWED', 'Você não tem permissão para enviar esse tipo de arquivo.');
	define('ERR_FILE_MOVE_FAILED', 'Falha ao mover o arquivo.');
	define('ERR_FILE_NOT_AVAILABLE', 'O arquivo não está disponível.');
	define('ERROR_FILE_TOO_BID', 'Arquivo muito grande. (max: %s)');
	define('FILE_FORM_TITLE', 'Formulário para Upload');
	define('FILE_LABEL_SELECT', 'Selecione Arquivo');
	define('FILE_LBL_MORE', 'Adicionar arquivo');
	define('FILE_CANCEL_UPLOAD', 'Cancelar upload');
	define('FILE_LBL_UPLOAD', 'Upload');
	//file download
	define('ERR_DOWNLOAD_FILE_NOT_FOUND', 'Nenhum arquivo selecionado para download.');
	//Rename
	define('RENAME_FORM_TITLE', 'Renomear formulário');
	define('RENAME_NEW_NAME', 'Novo nome');
	define('RENAME_LBL_RENAME', 'Renomear');

	//Tips
	define('TIP_FOLDER_GO_DOWN', 'Clique uma vez para acessar a pasta...');
	define('TIP_DOC_RENAME', 'Duplo-clique para editar...');
	define('TIP_FOLDER_GO_UP', 'Clique uma vez para acessar uma pasta acima...');
	define('TIP_SELECT_ALL', 'Selecionar todos');
	define('TIP_UNSELECT_ALL', 'Desmarcar todos');
	//WARNING
	define('WARNING_DELETE', 'Tem certeza que deseja exlcuir os documento(s) selecionado(s).');
	define('WARNING_IMAGE_EDIT', 'Selecione uma imagem para editar.');
	define('WARNING_NOT_FILE_EDIT', 'Selecione um arquivo apra editar.');
	define('WARING_WINDOW_CLOSE', 'Tem certeza que deseja fechar a janela?');
	//Preview
	define('PREVIEW_NOT_PREVIEW', 'Não há visualização disponível.');
	define('PREVIEW_OPEN_FAILED', 'Não é possível abrir o arquivo.');
	define('PREVIEW_IMAGE_LOAD_FAILED', 'Não é possível carregar a imagem');

	//Login
	define('LOGIN_PAGE_TITLE', 'Formulário de login');
	define('LOGIN_FORM_TITLE', 'Formulário de login');
	define('LOGIN_USERNAME', 'Usuário:');
	define('LOGIN_PASSWORD', 'Senha:');
	define('LOGIN_FAILED', 'Senha ou usuário inválido.');


	//88888888888   Below for Image Editor   888888888888888888888
		//Warning
		define('IMG_WARNING_NO_CHANGE_BEFORE_SAVE', 'Você não fez quaisquer alterações às imagens.');

		//General
		define('IMG_GEN_IMG_NOT_EXISTS', 'Imagem não existe');
		define('IMG_WARNING_LOST_CHANAGES', 'Todas as alterações não salvas serão perdidas, você tem certeza que deseja continuar?');
		define('IMG_WARNING_REST', 'Todas as alterações feitas na imagem não salvas serão perdidas, você tem certeza que deseja limpar?');
		define('IMG_WARNING_EMPTY_RESET', 'Nenhuma mudança foi feita para a imagem até agora');
		define('IMG_WARING_WIN_CLOSE', 'Tem certeza que deseja fechar a janela?');
		define('IMG_WARNING_UNDO', 'Tem certeza que deseja restaurar a imagem?');
		define('IMG_WARING_FLIP_H', 'Tem certeza de que para inverter a imagem horizontalmente?');
		define('IMG_WARING_FLIP_V', 'Tem certeza de que para inverter a imagem verticalmente');
		define('IMG_INFO', 'Info. Imagem');

		//Mode
			define('IMG_MODE_RESIZE', 'Redimensionar:');
			define('IMG_MODE_CROP', 'Cortar:');
			define('IMG_MODE_ROTATE', 'Rotacionar:');
			define('IMG_MODE_FLIP', 'Girar:');
		//Button

			define('IMG_BTN_ROTATE_LEFT', '90&deg;CCW');
			define('IMG_BTN_ROTATE_RIGHT', '90&deg;CW');
			define('IMG_BTN_FLIP_H', 'Girar horizontal');
			define('IMG_BTN_FLIP_V', 'Girar vertical');
			define('IMG_BTN_RESET', 'Limpar');
			define('IMG_BTN_UNDO', 'Voltar');
			define('IMG_BTN_SAVE', 'Salvar');
			define('IMG_BTN_CLOSE', 'Fechar');
			define('IMG_BTN_SAVE_AS', 'Salvar como');
			define('IMG_BTN_CANCEL', 'Cancelar');
		//Checkbox
			define('IMG_CHECKBOX_CONSTRAINT', 'Constrangimento?');
		//Label
			define('IMG_LBL_WIDTH', 'Largura:');
			define('IMG_LBL_HEIGHT', 'Altura:');
			define('IMG_LBL_X', 'X:');
			define('IMG_LBL_Y', 'Y:');
			define('IMG_LBL_RATIO', 'Relação:');
			define('IMG_LBL_ANGLE', 'Ângulo:');
			define('IMG_LBL_NEW_NAME', 'Novo nome:');
			define('IMG_LBL_SAVE_AS', 'Salvar formulário como');
			define('IMG_LBL_SAVE_TO', 'Salvar para:');
			define('IMG_LBL_ROOT_FOLDER', 'Pasta raiz');
		//Editor
		//Save as
		define('IMG_NEW_NAME_COMMENTS', 'Não contêm a extensão da imagem.');
		define('IMG_SAVE_AS_ERR_NAME_INVALID', 'Por favor, dê-lhe um nome que contém apenas letras, números, espaço, hífen e underscore.');
		define('IMG_SAVE_AS_NOT_FOLDER_SELECTED', 'Pasta de destino não selecionada.');
		define('IMG_SAVE_AS_FOLDER_NOT_FOUND', 'Pasta de destino não existe.');
		define('IMG_SAVE_AS_NEW_IMAGE_EXISTS', 'Existe uma imagem com o mesmo nome.');

		//Save
		define('IMG_SAVE_EMPTY_PATH', 'Caminho da imagem vazio.');
		define('IMG_SAVE_NOT_EXISTS', 'Imagem não existe.');
		define('IMG_SAVE_PATH_DISALLOWED', 'Você não tem permissão para acessar o arquivo.');
		define('IMG_SAVE_UNKNOWN_MODE', 'Reaçao inesperado');
		define('IMG_SAVE_RESIZE_FAILED', 'Falha ao redimensionar a imagem.');
		define('IMG_SAVE_CROP_FAILED', 'Failed to crop the image.');
		define('IMG_SAVE_FAILED', 'Failed to save the image.');
		define('IMG_SAVE_BACKUP_FAILED', 'Unable to backup the original image.');
		define('IMG_SAVE_ROTATE_FAILED', 'Unable to rotate the image.');
		define('IMG_SAVE_FLIP_FAILED', 'Unable to flip the image.');
		define('IMG_SAVE_SESSION_IMG_OPEN_FAILED', 'Unable to open image from session.');
		define('IMG_SAVE_IMG_OPEN_FAILED', 'Unable to open image');


		//UNDO
		define('IMG_UNDO_NO_HISTORY_AVAIALBE', 'Sem histórico disponível para desfazer.');
		define('IMG_UNDO_COPY_FAILED', 'Não é possível restaurar a imagem.');
		define('IMG_UNDO_DEL_FAILED', 'Não é possível excluir a imagem da sessão');

	//88888888888   Above for Image Editor   888888888888888888888

	//88888888888   Session   888888888888888888888
		define('SESSION_PERSONAL_DIR_NOT_FOUND', 'Não foi possível encontrar a pasta específicada.');
		define('SESSION_COUNTER_FILE_CREATE_FAILED', 'Impossível abrir o arquivo contador sessão.');
		define('SESSION_COUNTER_FILE_WRITE_FAILED', 'Não é possível gravar o contador da sessão de arquivo.');
	//88888888888   Session   888888888888888888888

	//88888888888   Below for Text Editor   888888888888888888888
		define('TXT_FILE_NOT_FOUND', 'Arquivo não for encontrado.');
		define('TXT_EXT_NOT_SELECTED', 'Por favor, selecione o arquivo de extensão');
		define('TXT_DEST_FOLDER_NOT_SELECTED', 'Por favor selecione a pasta de destino');
		define('TXT_UNKNOWN_REQUEST', 'Solicitação Desconhecida.');
		define('TXT_DISALLOWED_EXT', 'Você tem permissão para editar / adicionar tipo de ficheiro.');
		define('TXT_FILE_EXIST', 'Arquivo já existe.');
		define('TXT_FILE_NOT_EXIST', 'Não encontrado.');
		define('TXT_CREATE_FAILED', 'Falha ao criar novo arquivo.');
		define('TXT_CONTENT_WRITE_FAILED', 'Falha ao inserir conteúdo no arquivo.');
		define('TXT_FILE_OPEN_FAILED', 'Falha ao abrir o arquivo.');
		define('TXT_CONTENT_UPDATE_FAILED', 'Falha ao atualizar o conteúdo do arquivo.');
		define('TXT_SAVE_AS_ERR_NAME_INVALID', 'Por favor, dê-lhe um nome que contém apenas letras, números, espaço, hífen e underscore.');
	//88888888888   Above for Text Editor   888888888888888888888


?>