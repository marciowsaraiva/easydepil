<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/dashboard">{$smarty.const.NOME_APLICACAO}</a>            
        </div>        
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">   
        
        {if isset($smarty.session.user.nome)}
             <ul class="nav navbar-nav side-nav">     
                 {$smarty.session.user.menu_sidebar}                
             </ul>        
             <ul class="nav navbar-nav navbar-right navbar-user">
                 <li><a href="/dashboard">Dashboard</a></li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {if isset($smarty.session.user.nome)}{$smarty.session.user.nome}{/if} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile"><i class="fa fa-user"></i> Perfil</a></li>                                                
                        <li class="divider"></li>
                        <li><a href="/trocar_senha/troca_senha"><i class="fa fa-user"></i>Trocar Senha</a></li>
                        <li class="divider"></li>
                        <li><a href="/login/logout"><i class="fa fa-power-off"></i> Sair</a></li>
                    </ul>
                </li>
             </ul>
        {else}
             <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="/login"><i class="fa fa-dashboard"></i> Login</a></li>
             </ul>
        {/if}
    </div><!-- /.navbar-collapse -->
</nav>