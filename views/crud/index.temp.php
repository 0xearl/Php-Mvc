<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To My Little Framework</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <style>
        body {
            padding: 0px !important;
            margin: 0px !important;
            box-sizing: border-box;
        }

        .container-fluid {
            padding-right: 0px;
            padding-left: 0px;
        }
    </style>
    <main class="container-fluid">
        <div style="padding: 4rem 2rem; background-color: #e9ecef;">
            <h1 class="display-3">Add User</h1>
            <hr class='my-2'>
            <div class="row" style="width: 100%;">

                <div class="col m-2 p-2">
                    <?php flash('danger'); ?>
                    <?php flash('success'); ?>
                    <form method="POST" action="/add-user">
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input type="text" name="name" class="form-control" id="nameInput" placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordInput">
                            <p id="passwordToggle" class="my-2">View Password</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col m-2 p-2">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <th scope="row"><?= $user['id'] ?></th>
                                    <td><?= $user['name'] ?></td>
                                    <td>
                                        <a href="/add-user/show?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="/add-user/destroy?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

    <script defer>
        $(document).ready(function() {
            $('#passwordToggle').click(function() {
                var passwordInput = $('#passwordInput');
                if (passwordInput.attr('type') === 'text') {
                    passwordInput.attr('type', 'password');
                } else {
                    passwordInput.attr('type', 'text');
                }
            });
        });
    </script>

</body>

</html>