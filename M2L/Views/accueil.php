<section id="templatemo-page1-text" class="active">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div id="detailForm">
                <h2 class="col-lg-12 ">Liste des formations proposé</h2>
                <table class="table table-default">
                                    <thead>
                                      <tr>
                                        <th>Formations</th>
                                        <th>Date</th>
                                        <th>Durée</th>
                                        <th>Plus d'info</th>
                                        <th>Suivre</th>
                                      </tr>
                                    </thead><i></i>
                <?php
                foreach ($Formations as $key => $value) {
                echo('
                    <tbody>
                        <tr>
                           <td>'.$value["libelle"].'</td>
                           <td>'.$value['date_f'].'</td>
                           <td>'.$value['NbJour'].'</td>
                           <td>
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#'.$value['id_f'].'">+</button>
                            <div class="modal fade" id='.$value['id_f'].' role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">'.$value['libelle'].'</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="modalContent">Le :'.$value['date_f'].'</h4>
                                            <h4 class="modalContent">Durée :'.$value['NbJour'].'</h4>
                                            <h4 class="modalContent">Adresse :<h5 class="modalContent">todo</5></h4>
                                            <h5 class="modalContent">Description:'.$value['contenu'].'</h5>  
                                        </div>
                                    </div> 
                                </div>
                            </div>
                           </td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn" name="Suivre" >
                                        <span>Suivre</span>
                                    </button>  
                                    <input name="idForm" type="hidden" value="'.$value['id_f'].'" >
                                </form>
                            </td>
                        </tr>
                    </tbody>');
} 


                ?>
                </table>
        </div>

    </div>
    </div>

<div class="clearfix"></div>
</section>




