<script>
<!--    TOAST ALERT-->
    <?php if(session('toast_info')): ?>
    toast({msg: '<?= session('toast_info') ?>', type: 'info'});
    <?php endif; ?>

    <?php if(session('toast_success')): ?>
    toast({msg: '<?= session('toast_success') ?>', type: 'success'});
    <?php endif; ?>

    <?php if(session('toast_warning')): ?>
    toast({msg: '<?= session('toast_warning') ?>', type: 'warning'});
    <?php endif; ?>

    <?php if(session('toast_error') || session('toast_danger')): ?>
    toast({msg: '<?= session('toast_error') ?: session('toast_danger') ?>', type: 'danger'});
    <?php endif; ?>

<!--    SWEET ALERT-->
    <?php if(session('sweet_error')): ?>
    sweet({msg: '<?= session('sweet_error') ?>', type: 'error'});
    <?php endif; ?>

    <?php if(session('sweet_warning')): ?>
    sweet({msg: '<?= session('sweet_warning') ?>', type: 'warning'});
    <?php endif; ?>

    <?php if(session('sweet_success')): ?>
    sweet({msg: '<?= session('sweet_success') ?>', type: 'success', title: 'GREAT!!'});
    <?php endif; ?>


    function sweet(data) {
        Swal.fire({
            title: data.title ? data.title : 'Oops...',
            text: data.msg,
            icon: data.type
        });
    }

    function toast(data) {
        Toastify({
            text: data.msg,
            duration: 7000,
            close: true,
            className: data.type,
        }).showToast();
    }
</script>