<div id="user-image-container" class="d-flex flex-column justify-content-center">
    <img id="userImage" src="/images/<?= $userImage ?? 'default-picture.jpg' ?>" width="200" height="200" class="rounded-circle shadow" style="object-fit: cover;" alt="User Image">
</div>

<script>
    $(document).ready(function() {
        const userId = '<?= $userId ?>'; // PHP variable for userId
        const userImage = '<?= $userImage ?>'; // PHP variable for userImage

        function loadImage() {
            $.ajax({
                url: /useraccount/getUserImage/${userImage},  // The URL to get the user image
                method: 'GET',
                success: function(response) {
                    $('#userImage').attr('src', response);
                },
                error: function() {
                    console.error('Error loading image');
                }
            });
        }

        if (userImage) {
            loadImage();
        }
    });
</script>