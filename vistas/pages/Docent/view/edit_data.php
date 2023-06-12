<table class="table table-dark table-bordered border-primary">
table table-bordered border-primary

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

                <div class="btn-group">

                    <div class="px-1">

                        <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i
                                class="fa-solid fa-pencil" style="color: #000000;"></i></a>

                    </div>

                    <form method="post">

                        <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarUsuario">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"
                                style="color: #000000"></i></button>


                    </form>

                </div>

            </td>
        </tr>

    </tbody>

</table>