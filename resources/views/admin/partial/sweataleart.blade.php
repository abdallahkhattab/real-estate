
<script>
    function confirmDelete(event, formId) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit(); // Submit the form if confirmed
            }
        });
    }
</script>
