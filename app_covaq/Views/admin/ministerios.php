<?php include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    
    <script src="javascript/js_modal.js"></script>

    <script src="javascript/jquery/jquery.js"></script>
    <script src="javascript/jquery/jquery.min.js"></script>

        <style>
                @keyframes hide {
                    from { opacity: 1 }
                    to   { opacity: 0 }
                    }

                    .msg{
                    animation: hide 2s 2s forwards;
                    }
            </style>

</head>
<body>

        <main>
                <?php                    
                if(isset($_POST['enviar']) OR isset($_GET['cod'])){
                    if(isset($dadosModel[0])){?>
                    <div class="msg" id="mensagem" style="padding: 6px; background-color:red; color:  #fff; font-size:small">                       
                         <img src="<?php echo $pach?>img/error.png" alt="">&nbsp;<?php echo $dadosModel[0];?>
                    </div>
                    <?php  } else{ ?>
                        
                    <div id="mensagem" style="padding: 6px; background-color: green; color: #fff; font-size:small">                       
                    <img src="<?php echo($pach)?>img/save.png" alt="">&nbsp;<?php echo $dadosModel[1]; ?>
                    </div>  
               <?php } }         
                ?>
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header" id="titulo">
                            <h3>Ministérios</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Nono ministério</a>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>min/buscar">
                                            <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                                            <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                        </form>                                  
                                    </div>
                                 </div>
                                 <div class="card-body-header">                                                             
                                    <small> 
                                        <?php 
                                        if(isset($_POST['texto'])){ 
                                            echo 'Registos encontrados: '.count($this->dados);
                                            }else{ echo 'Total de registos: '.count($this->dados2);
                                            }
                                        
                                        ?>
                                    </small>
                                    <a href="imprimir.php" class="">Imprimir</a>
                                </div>
                                <div class="table-responsive">
                                    <table width="100%" class="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td>Ministério</td>                                              
                                                <td>Propósito</td>  
                                                <td>Lider</td>
                                                <td>Membros</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_POST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){ ?>
                                                    <tr>
                                                        <td> <?php echo $row->nome; ?></td>
                                                        <td> <?php echo $row->descricao; ?> </td>  
                                                        <td> <?php echo $row->lider; ?> </td>   
                                                        <td> <?php echo $row->total; ?> </td> 
                                                        <td> 
                                                            <a href="#">Add membro</a>
                                                        </td>                                         
                                                        <td>    
                                                            <a href="<?php echo $pach?>min/novo&id=<?php echo $row->id_min; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>min/eliminar&cod=<?php echo $row->id_min; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a> 
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->nome; ?></td>
                                                        <td> <?php echo $row->descricao; ?> </td>  
                                                        <td> <?php echo $row->lider; ?> </td>  
                                                        <td> <?php echo $row->total; ?> </td> 
                                                        <td> 
                                                            <a href="#">Add membro</a>
                                                        </td>      
                                                        <td> 
                                                            <a href="<?php echo $pach?>min/novo&id=<?php echo $row->id_min; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>min/eliminar&cod=<?php echo $row->id_min; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a> 
                                                            
                                                        </td>
                                                    </tr>
                                                <?php } 
                                         }?>  
                                                                                                              
                                        </tbody>                                       
                                    </table>     
                                </div>
                               
                            </div>
                        </div>
                     </div>

                </div>
            </div>

                
            <div class="container">
                <div class="container-header">
                    <div class="title">Novo ministério</div>
                    <a href="<?php echo($pach)?>min" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>min/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome</span>
                            <input type="hidden" name="id_min" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_min; ?>">
                            <input type="text" name="nome" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->nome; ?>" placeholder="Nome do ministério" require>
                        </div>
                        <div class="input-box">
                            <span class="details">Propósito</span>
                            <input type="text" name="descricao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->descricao; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Lider</span>
                            <input type="text" name="lider" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->lider; ?>"  require>
                        </div>                   
                                           
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>
       

</body>
</html>