// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // Use jQuery to handle form submission for multiple forms
    $("form").on("submit", function (event) {
        let isValid = true;
        let form = $(this); // Reference to the current form

        // Loop through all required fields in the current form
        form.find("[required]").each(function () {
            let field = $(this);
            let type = field.attr("type");
            let name = field.attr("name");
            let label = $("label[for='" + name + "']").text(); // Get the label text

            // Check if Select2 field is empty
            if (field.hasClass("select2-hidden-accessible") && !field.val()) {
                field
                    .next(".select2-container")
                    .find(".select2-selection")
                    .addClass("is-invalid");
                if (
                    !field.next(".select2-container").next(".invalid-feedback")
                        .length
                ) {
                    field
                        .next(".select2-container")
                        .after(
                            '<div class="invalid-feedback">This field is required</div>'
                        );
                }
                isValid = false;
            } else if (type === "file") {
                if (!field[0].files.length) {
                    // Check if no file has been selected
                    field.addClass("is-invalid");
                    field.closest(".pic-holder").addClass("is-invalid"); // Add to parent div
                    if (!field.next(".invalid-feedback").length) {
                        field.after(
                            '<div class="invalid-feedback">This field is required</div>'
                        );
                    }
                    isValid = false;
                }
            }

            // Check if radio or checkbox is selected
            else if (type === "radio" || type === "checkbox") {
                if (!$("input[name='" + name + "']:checked").length) {
                    $("input[name='" + name + "']").addClass("is-invalid");
                    if (
                        !$("input[name='" + name + "']").next(
                            ".invalid-feedback"
                        ).length
                    ) {
                        $("input[name='" + name + "']")
                            .last()
                            .after(
                                '<div class="invalid-feedback">This field is required</div>'
                            );
                    }
                    isValid = false;
                }
            } else if (type === "email") {
                const emailVal = field.val();
                const emailRegex =
                    /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (!emailRegex.test(emailVal)) {
                    field.addClass("is-invalid");
                    if (!field.next(".invalid-feedback").length) {
                        field.after(
                            '<div class="invalid-feedback">Please enter a valid email address.</div>'
                        );
                    }
                    isValid = false;
                    return;
                }
            }

            // Check other inputs (e.g., text, email, textarea)
            else {
                if (!field.val()) {
                    field.addClass("is-invalid");

                    // Add the new condition for 'phone' field
                    if (field.attr("name") === "phone") {
                        field.closest(".form-group").addClass("phone-error");
                    }

                    if (!field.next(".invalid-feedback").length) {
                        field.after(
                            '<div class="invalid-feedback">This field is required.</div>'
                        );
                    }
                    isValid = false;
                }
            }
        });

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }

        // Add Bootstrap class for visual feedback
        form.addClass("was-validated");
    });

    // Handle input/change/focus events for required fields
    $("form").on("input change focus", "[required]", function () {
        let field = $(this);
        let form = $(this).closest("form"); // Get the closest form to the field

        if (field.hasClass("select2-hidden-accessible") && field.val()) {
            field
                .next(".select2-container")
                .find(".select2-selection")
                .removeClass("is-invalid");
        } else if (
            field.attr("type") === "radio" ||
            field.attr("type") === "checkbox"
        ) {
            if ($("input[name='" + field.attr("name") + "']:checked").length) {
                $("input[name='" + field.attr("name") + "']").removeClass(
                    "is-invalid"
                );
            }
        } else if (field.attr("type") === "file" && field[0].files.length) {
            field.removeClass("is-invalid");
            field.closest(".pic-holder").removeClass("is-invalid"); // Remove from parent div
        } else if (field.val()) {
            field.removeClass("is-invalid");
        }

        // Remove phone-error class if this is phone field and has value
        if (field.attr("name") === "phone") {
            if (field.val()) {
                field.closest(".form-group").removeClass("phone-error");
            } else {
                field.closest(".form-group").addClass("phone-error");
            }
        }
    });
});
