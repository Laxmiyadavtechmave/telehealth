<script>
    const dataTables = {};

    function setupCustomUI(tableInstance, index) {
        const toolbarSelector = `.contact-toolbar-left${index}`;
        const $toolbar = $(toolbarSelector);

        // Add filter text
        $toolbar.addClass("contact-toolbar-left").html(
            '<div class="d-xxl-flex filterbyTable d-none align-items-center form-group mb-0">' +
            '<label class="flex-shrink-0 mb-0 me-2">Filter by:</label></div>'
        );

        // Length menu
        if ($(`${toolbarSelector} .dataTables_length`).length === 0) {
            const lengthMenu = $(
                `<div class="dataTables_length">
                <label>Show </label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <label> entries</label>
            </div>`
            );

            // Bind select change to DataTable page length update
            lengthMenu.find('select').on('change', function() {
                tableInstance.page.len($(this).val()).draw();
            });

            $toolbar.append(lengthMenu);
        }

        // Column visibility toggle
        const columnDropdown = $('<div class="dropdown d-inline-block"></div>');
        const columnButton = $(`
        <button class="btn-sm dropdown-toggle d-flex align-items-center w-130p form-select form-select-sm" type="button" data-bs-toggle="dropdown" id="columnDropdown" aria-expanded="false">
            <i class="bi bi-layout-three-columns"></i> Columns</button>
    `);
        const columnMenu = $('<ul class="dropdown-menu columnvisible_dropdownmenus"></ul>');

        tableInstance.columns().every(function(index) {
            const column = this;
            const colName = column.header().textContent;

            // Hide from dropdown: column index 0 (id) OR empty header
            if (index === 0 || colName.trim() === '' || column.visible() === false && colName === '') return;

            const checkbox = $(`<li><label class="dropdown-item">
            <input type="checkbox" class="form-check-input is-valid">
            ${colName}</label></li>`);

            checkbox.find('input')
                .prop('checked', column.visible())
                .on('change', function() {
                    column.visible($(this).is(':checked'));
                });

            columnMenu.append(checkbox);
        });

        columnDropdown.append(columnButton).append(columnMenu);
        $toolbar.append(columnDropdown);

        // Export dropdown
        const exportDropdown = $('<div class="dropdown d-inline-block"></div>');
        const exportButton = $(
            `<button class="btn-sm dropdown-toggle d-flex align-items-center w-130p form-select form-select-sm" type="button" data-bs-toggle="dropdown" id="exportDropdown" aria-expanded="false">
            <i class="bi bi-download"></i> Export</button>`
        );
        const exportMenu = $('<ul class="dropdown-menu exportdropdown_menu"></ul>');

        exportDropdown.append(exportButton).append(exportMenu);
        new $.fn.dataTable.Buttons(tableInstance, {
            buttons: ['copy', 'excel', 'csv', 'pdf']
        }).container().appendTo(exportMenu);

        $toolbar.append(exportDropdown);
    }

    function initializeDataTable(tableId, ajaxUrl, columns, index = 0, getAjaxData = () => ({}), defaultOrder = [
        [1, 'asc']
    ]) {
        let $table = $(tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: ajaxUrl,
                data: function(d) {
                    // Merge dynamic data on every request
                    return Object.assign(d, getAjaxData());
                }
            },
            columns: columns,
            pagingType: 'simple_numbers',
            dom: '<"row"<"col-7 mb-3 contact-toolbar-left' + index +
                '"><"col-5 mb-3 contact-toolbar-right"flip>>' +
                '<"row"<"col-sm-12"t>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            order: defaultOrder,
            language: {
                search: "",
                searchPlaceholder: "Search here...",
                info: "_START_ - _END_ of _TOTAL_",
                sLengthMenu: "View  _MENU_",
                paginate: {
                    next: '<i class="ri-arrow-right-s-line"></i>',
                    previous: '<i class="ri-arrow-left-s-line"></i>'
                }
            },
            drawCallback: function() {
                $(tableId).closest('.common-datatable_wrapper').find('.pagination')
                    .addClass('custom-pagination pagination-simple justify-content-end');
            }
        });

        setupCustomUI($table, index);
        dataTables[tableId] = $table;
        return $table;
    }
</script>
