$(document).on("change", ".uploadProfileInput", function () {
    const triggerInput = $(this);
    const wrapper = triggerInput.closest(".profile-pic-wrapper");
    const holder = triggerInput.closest(".pic-holder");
    const pic = holder.find(".pic");
    const currentImg = pic.attr("src");
    const file = this.files[0];

    // Remove old alerts/snackbars
    wrapper.find('[role="alert"]').remove();

    if (!file || !window.FileReader) return;

    // Validate file type
    if (!file.type.match(/^image/)) {
        wrapper.append(
            '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>'
        );
        setTimeout(() => {
            wrapper.find('[role="alert"]').remove();
        }, 3000);
        return;
    }

    // Validate file size (5MB max)
    if (file.size > 5 * 1024 * 1024) {
        wrapper.append(
            '<div class="alert alert-danger d-inline-block p-2 small" role="alert">File size must be less than 5MB.</div>'
        );
        setTimeout(() => {
            wrapper.find('[role="alert"]').remove();
        }, 3000);
        return;
    }

    const reader = new FileReader();
    reader.onloadend = function () {
        holder.addClass("uploadInProgress");
        pic.attr("src", this.result);

        const loader = $('<div class="upload-loader"></div>').html(
            '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
        );
        holder.append(loader);

        setTimeout(() => {
            holder.removeClass("uploadInProgress");
            loader.remove();

            // Simulate random success/failure
            const random = Math.random();
            if (random < 0.9) {
                // wrapper.append(
                //     '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Image uploaded successfully</div>'
                // );
                // triggerInput.val("");
                wrapper.find(".upload-file-block").css("opacity", "0");

                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
            } else {
                pic.attr("src", currentImg);
                wrapper.append(
                    '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There was an error while uploading! Please try again later.</div>'
                );
                triggerInput.val("");
                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
            }
        }, 1500);
    };

    reader.readAsDataURL(file);
});
