    <h1>Edit Data Produk</h1>
    <form name="form_edit">
        <label for="">ID Produk</label><br><br>
        <input type="text" name="product_id" value="<?php echo $row->product_id; ?>"><br><br>
        <label for="">Nama Produk</label><br><br>
        <input type="text" name="name" value="<?php echo $row->name; ?>"><br><br>
        <label for="">Price</label><br><br>
        <input type="text" name="price" value="<?php echo $row->price; ?>"><br><br>
        <label for="">Description</label><br><br>
        <input type="text" name="description" value="<?php echo $row->description; ?>"><br><br>
        <button type="submit">Edit</button>
    </form>

    <script>
        $('[name="form_edit"]').on('submit',function(e){
            e.preventDefault();

            var name= $('[name="name"]').val();

            var dataForm = $(this).serialize();
            console.log(dataForm);
            $.ajax({
                url : "<?php echo base_url('crud/edit'); ?>",
                type: "POST",
                data: dataForm + "&submit=1",
                success: function(data)
                {
                    console.log('sukses');

                    setTimeout(function(){
                        window.location = "<?php echo base_url('crud/index') ?>";
                    }, 2000);
                },
                error: function(){
                    seTimeout(function(){
                        window.location = "<?php echo base_url('crud/add') ?>";
                    }, 2000);
                    console.log('error');
                }
            });
        });
    </script>