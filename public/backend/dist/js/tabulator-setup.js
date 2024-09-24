export function setupTabulator() {
    "use strict"; // Tabulator

    if ($("#tabulator").length) {
        // Filter function
        var filterHTMLForm = function filterHTMLForm() {
            var field = $("#tabulator-html-filter-field").val();
            var type = $("#tabulator-html-filter-type").val();
            var value = $("#tabulator-html-filter-value").val();
            //console.log(field + " " + type + " " + value);
            table.setFilter(field, type, value);
        }; // On submit filter form

        var baseURL = window.location.origin;

        // Setup Tabulator
        var table = new tabulator_tables__WEBPACK_IMPORTED_MODULE_1__["default"]("#tabulator", {
            ajaxURL: baseURL + "/admin/size_management/get",
            ajaxFiltering: true,
            ajaxSorting: true,
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitDataTable",
            responsiveLayout: "collapse",
            placeholder: "Không có bản ghi nào được tìm thấy",
            columns: [{
                formatter: "responsiveCollapse",
                width: 40,
                minWidth: 30,
                hozAlign: "center",
                resizable: false,
                headerSort: false
            }, // For HTML table
            {
                title: "ID",
                minWidth: 100,
                field: "id",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,
            },
            {
                title: "TÊN KÍCH THƯỚC",
                minWidth: 200,
                field: "name",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false
            },
            {
                title: "CÂN NẶNG",
                minWidth: 200,
                field: "weight",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,

            },{
                title: "CHIỀU CAO",
                minWidth: 200,
                field: "height",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,

            },
            {
                title: "VÒNG NGỰC",
                minWidth: 200,
                field: "chest",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,

            },
            {
                title: "MÔ TẢ",
                minWidth: 200,
                field: "description",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,

            },
            {
                title: "HÀNH ĐỘNG",
                minWidth: 200,
                field: "action",
                hozAlign: "left",
                vertAlign: "middle",
                visible: true,
                print: false,
                formatter: function formatter(cell, formatterParams) {
                    var a = $("<div class=\"flex lg:justify-center items-center\">\n                            <button data-tw-toggle=\"modal\" data-tw-target=\"#update-size-form\" class=\"edit flex items-center mr-3\">\n                                <i data-lucide=\"check-square\" class=\"w-4 h-4 mr-1\"></i> Sửa\n                            </button>\n                            <button data-tw-toggle=\"modal\" data-tw-target=\"#delete-size-form\" class=\"delete flex items-center text-danger\">\n                                <i data-lucide=\"trash-2\" class=\"w-4 h-4 mr-1\"></i> Xóa\n                            </button>\n                        </div>");
                    $(a).find(".edit").on("click", function () {
                        var rowData = cell.getRow().getData();
                        $('#update-size-form #id').val(rowData.id);
                        $('#update-size-form #name').val(rowData.name);
                        $('#update-size-form #weight').val(rowData.weight);
                        $('#update-size-form #height').val(rowData.height);
                        $('#update-size-form #chest').val(rowData.chest);
                        $('#update-size-form #description').val(rowData.description);
                    });
                    $(a).find(".delete").on("click", function () {
                        var rowData = cell.getRow().getData();
                        $('#delete-size-form #del-size-id').val(rowData.id);
                        $('#delete-size-form #del-size-name').html(rowData.name);
                    });
                    return a[0];
                }
            }, // For print format
            {
                title: "ID",
                field: "id",
                visible: false,
                print: true,
                download: true
            }, {
                title: "TÊN KÍCH THƯỚC",
                field: "name",
                visible: false,
                print: true,
                download: true
            }, {
                title: "CÂN NẶNG",
                field: "weight",
                visible: false,
                print: true,
                download: true
            }, {
                title: "CHIỀU CAO",
                field: "height",
                visible: false,
                print: true,
                download: true
            }, {
                title: "VÒNG NGỰC",
                field: "chest",
                visible: false,
                print: true,
                download: true
            }, {
                title: "MÔ TẢ",
                field: "description",
                visible: false,
                print: true,
                download: true
            }],
            renderComplete: function renderComplete() {
                (0, lucide__WEBPACK_IMPORTED_MODULE_2__.createIcons)({
                    icons: lucide__WEBPACK_IMPORTED_MODULE_3__,
                    "stroke-width": 1.5,
                    nameAttr: "data-lucide"
                });
            }
        }); // Redraw table onresize

        window.addEventListener("resize", function () {
            table.redraw();
            (0, lucide__WEBPACK_IMPORTED_MODULE_2__.createIcons)({
                icons: lucide__WEBPACK_IMPORTED_MODULE_3__,
                "stroke-width": 1.5,
                nameAttr: "data-lucide"
            });
        });
        $("#tabulator-html-filter-form")[0].addEventListener("keypress", function (event) {
            var keycode = event.keyCode ? event.keyCode : event.which;

            if (keycode == "13") {
                event.preventDefault();
                filterHTMLForm();
            }
        }); // On click go button

        $("#tabulator-html-filter-go").on("click", function (event) {
            filterHTMLForm();
        }); // On reset filter form

        $("#tabulator-html-filter-reset").on("click", function (event) {
            $("#tabulator-html-filter-field").val("name");
            $("#tabulator-html-filter-type").val("like");
            $("#tabulator-html-filter-value").val("");
            filterHTMLForm();
        }); // Export

        $("#tabulator-export-csv").on("click", function (event) {
            table.download("csv", "data.csv");
        });
        $("#tabulator-export-json").on("click", function (event) {
            table.download("json", "data.json");
        });
        $("#tabulator-export-xlsx").on("click", function (event) {
            window.XLSX = (xlsx__WEBPACK_IMPORTED_MODULE_0___default());
            table.download("xlsx", "data.xlsx", {
                sheetName: "Products"
            });
        });
        $("#tabulator-export-html").on("click", function (event) {
            table.download("html", "data.html", {
                style: true
            });
        }); // Print

        $("#tabulator-print").on("click", function (event) {
            table.print();
        });
    }
}