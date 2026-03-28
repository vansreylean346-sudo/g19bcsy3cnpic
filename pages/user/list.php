<div class="container">
    <div class="d-flex justify-content-between mt-5">
        <h3>User List</h3>
        <a href="./?page=user/create" class="btn btn-success">Create New</a>
    </div>
    <div class="table-reposive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = getUsers();
                $count = 1;
                while ($row = $users->fetch_object()) {
                    ?>

                    <tr>
                        <td><?php echo $count ?></td>
                        <td><img width="50px" src="
                        <?php echo $row->photo ?? './assets/images/emptyuser.png' ?>
                        "></td>
                        <td><?php echo $row->name ?></td>
                        <td>
                            <a href="./?page=user/update&id=<?php echo $row->id ?>" class="btn btn-primary">Update
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a href="./?page=user/delete&id=<?php echo $row->id ?>"
                                class="btn btn-danger button-delete">Delete
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>

                    </tr>
                    <?php
                    $count++;
                }
                ?>
            </tbody>

        </table>
    </div>

</div>

<script>

    // const btnDeletes = document.querySelectorAll('.button-delete');
    // btnDeletes.forEach(element => {
    //     element.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         alert('click')
    //     });
    // });
    $('.button-delete').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f01010",
            cancelButtonColor: "rgb(125, 155, 230)",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('href');
            };
        });
    });
</script>