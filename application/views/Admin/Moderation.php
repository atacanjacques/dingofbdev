

<div class="container">
<div class="row">
    <h2>Paramètres des utilisateurs</h2>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Recherche image par id">
        <span class="input-group-btn">
      <button class="btn btn-primary" type="button">Rechercher une image</button>
    </span>
    </div>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Images</th>
            <th>Titre de la photo</th>
            <th>Utilisateur</th>
            <th>Actions</th>
        </tr>
        <?php for($i=1;$i<11;$i++): ?>
            <tr>
                <td><?php echo $i?></td>
                <td><img src="<?php echo base_url('assets/img/Tattoo.png'); ?>" width="50" height="50"></td>
                <td>Lorem Ipsum</td>
                <td>Jotaro Kujo</td>
                <td><a href="#delete-user">Delete<span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
        <?php endfor; ?>
    </table>
    <div class="text-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</div>