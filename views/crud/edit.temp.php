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
            <h1 class="display-3">Edit User</h1>
            <hr class='my-2'>
            <div class="col-4 m-2 p-2">
                <?php if ( session()->has('error') ): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('error') ?>
                        <?php session()->remove('error') ?>
                    </div>
                <?php endif; ?>
                <?php if ( session()->has('success') ): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                        <?php session()->remove('success') ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="/add-user/update">
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" name="name" class="form-control" id="nameInput" value="<?=$user['name']?>">
                    </div>
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordInput">
                        <p id="passwordToggle" class="my-2">View Password</button>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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