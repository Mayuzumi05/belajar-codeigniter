<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>css/output.css?v=1.0" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="p-[24px] bg-[#F6F6F2]">

    <a href="<?php echo base_url('home/create') ?>">
        <button class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white mb-[16px]">
            Tambah Data
        </button>
    </a>
    
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
                    <a href="<?php echo base_url('home/edit/'.$data['id']) ?>" class="no-underline">
                        <button class="bg-[#388087] px-[16px] py-[8px] rounded-[4px] text-white">
                            Edit
                        </button>
                    </a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>