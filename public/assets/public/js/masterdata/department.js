var t, method;

function addFormDepartment() {
    method = "add";
    $("input[name=_method]").val("POST");
    $("#modal-department").modal("show");
    $("#modal-department form")[0].reset();
    $(".modal-title").text("Add New Department");
}

function editFormDepartment(id) {
    method = "edit";
    $("input[name=_method]").val("PATCH");
    $("#modal-department form")[0].reset();
    $.get(`department/${id}/edit`, function(data) {
        $("#modal-department").modal("show");
        $(".modal-title").text(`Edit Department: ${data.dpt_name}`);
        $("#id_department").val(data.id);
        $("#department_name").val(data.dpt_name);
    });
}

function deleteFormDepartment(id) {
    const token = $('input[name ="_token"]').val();
    swal({
        title: "Are You Sure Want To Delete This Data?",
        text: "Your Data Will Be Lost Forever!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            const data = {
                _method: "DELETE",
                _token: token
            };
            $.post(`department/${id}`, data)
                .done(function(result) {
                    if (result.success === true) {
                        swal("Success!", result.messages, "success");
                        t.ajax.reload();
                    } else {
                        swal("Oops", result.messages, "error");
                    }
                    $("#modal-department").modal("hide");
                })
                .fail(function() {
                    swal("Oops", "Ajax Failed!", "error");
                });
        } else {
            swal("Huff, that was close. Action Cancelled!");
        }
    });
}

$(document).ready(() => {
    t = $("#tbl-department").DataTable({
        ajax: {
            url: "department_data",
            dataSrc: ""
        },
        dom: "Bftrlp",
        processing: true,
        responsive: true,
        autoWidth: false,
        buttons: ["csv", "excel", "pdf", "print", "colvis"],
        columns: [
            {
                data: "id",
                defaultContent: ""
            },
            {
                data: "dpt_name"
            },
            {
                data: null,
                render: function(data, type, row) {
                    let btnEdit = `<a onclick="editFormDepartment(${data.id})" class="btn bg-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>`;
                    let btnDelete = `<a onclick="deleteFormDepartment(${data.id})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>`;
                    return btnEdit + btnDelete;
                }
            }
        ]
    });

    t.on("order.dt search.dt", function() {
        t.column(0, { search: "applied", order: "applied" })
            .nodes()
            .each(function(cell, i) {
                cell.innerHTML = i + 1;
                t.cell(cell).invalidate("dom");
            });
    }).draw();

    $(document).on("click", "#btn-add-department", () => {
        addFormDepartment();
    });

    // form validation
    $("#form-department").validate({
        rules: {
            department_name: {
                required: true
            }
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        }
    });

    $("#form-department").submit(function(e) {
        e.preventDefault();

        var validate = $(this).valid();

        if (!validate) {
            return;
        }
        const id = $("#id_department").val();
        if (method === "add") {
            url = "department";
        } else {
            url = `department/${id}`;
        }

        const data = $(this).serialize();

        $.post(url, data)
            .done(function(result) {
                if (result.success === true) {
                    swal("Success!", result.messages, "success");
                    $("#modal-department").modal("hide");
                } else {
                    swal("Oops", result.messages, "error");
                    $("#modal-department").modal("hide");
                }
                $("#modal-department").modal("hide");
                t.ajax.reload();
            })
            .fail(function() {
                swal("Oops", "Ajax Failed!", "error");
            });
    });
});
