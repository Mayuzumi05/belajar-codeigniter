<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>css/output.css?v=1.0" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="p-[24px] bg-[#F6F6F2]">

    <button class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white mb-[16px]" data-toggle="modal" data-target="#addBookModal">
        Tambah Data
    </button>
    
    <?php if(!empty(session()->getFlashdata('message'))) : ?>

    <div class="alert alert-success">
        <?php echo session()->getFlashdata('message');?>
    </div>
        
    <?php endif ?>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($books as $key => $data) : ?>
            <tr>
                <th scope="row"><?php echo $data['id'] ?></th>
                <td><?php echo $data['title'] ?></td>
                <td><?php echo $data['author'] ?></td>
                <td>
                    <button class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white" data-toggle="modal" data-target="#updateBookModal<?= $data['id'] ?>">
                        Edit
                    </button>
                    <div class="modal fade" id="updateBookModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="updateBookModalLabel<?= $data['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateBookModalLabel<?= $data['id'] ?>">Edit Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form tambah produk -->
                                    <form action="/home/update/<?= $data['id'] ?>" method="post">
                                        <div class="form-group">
                                            <label for="bookTitle">Judul Buku</label>
                                            <input type="text" class="form-control" id="bookTitle" name="title" value="<?= esc($data['title']) ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookAuthor">Pengarang</label>
                                            <input type="text" class="form-control" id="bookAuthor" name="author" value="<?= esc($data['author']) ?>" required>
                                        </div>
                                        <button type="submit" class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white mt-[16px]">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('home/delete/'.$data['id']) ?>" class="no-underline">
                        <button class="bg-[#DD5211] px-[16px] py-[8px] rounded-[4px] text-white">
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <?php echo $pager->links('book', 'pagination') ?>

    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Tambah Buku Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah produk -->
                    <form action="/home/store" method="post">
                        <div class="form-group">
                            <label for="bookTitle">Judul Buku</label>
                            <input type="text" class="form-control" id="bookTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="bookAuthor">Pengarang</label>
                            <input type="text" class="form-control" id="bookAuthor" name="author" required>
                        </div>
                        <button type="submit" class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white mt-[16px]">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>