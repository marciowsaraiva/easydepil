    <div class="row">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="atender">                
                    <div class="col-xs-10">
                        <div class="form-group">
                            <label for="nomecliente">Cliente </label>
                            <input type="hidden" id="idCliente" class="form-control" nome="idCliente" value='{$idCliente|default:''}' readonly/>
                            <input type="text" id="nomecliente" class="form-control" nome="nomecliente" value='{$nomeCliente|default:''}' readonly/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>         
    <br>                        
    <div class="row">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="atender">                
                    <div class="col-xs-10">
                        <div class="form-group">
                            <label for="nometratamento">Tratamento </label>
                            <input type="hidden" id="idAgenda" class="form-control" nome="idAgenda" value='{$idAgenda|default:''}' readonly/>
                            <input type="hidden" id="idTratamento" class="form-control" nome="idTratamento" value='{$idTratamento|default:''}' readonly/>
                            <input type="text" id="nometratamento" class="form-control" nome="nometratamento" value='{$nomeTratamento|default:''}' readonly/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                                                                                