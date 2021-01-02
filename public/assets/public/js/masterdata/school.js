var t, method;

function addFormSchool() {
    method = "add";
    $("input[name=_method]").val("POST");
    $("#modal-school").modal("show");
    $("#modal-school form")[0].reset();
    $("#school_address").text("");
    $(".modal-title").text("Add New School");
}

function editFormSchool(id) {
    method = "edit";
    $("input[name=_method]").val("PATCH");
    $("#modal-school form")[0].reset();
    $.get(`school/${id}/edit`, function(data) {
        $("#modal-school").modal("show");
        $(".modal-title").text(`Edit School: ${data.school_name}`);
        $("#id_school").val(data.id);
        $("#school_name").val(data.school_name);
        $("#school_address").text(data.school_address);
    });
}

function deleteFormSchool(id) {
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
            $.post(`school/${id}`, data)
                .done(function(result) {
                    if (result.success === true) {
                        swal("Success!", result.messages, "success");
                        t.ajax.reload();
                    } else {
                        swal("Oops", result.messages, "error");
                    }
                    $("#modal-school").modal("hide");
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
    t = $("#tbl-school").DataTable({
        ajax: {
            url: "school_data",
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
                data: "school_name"
            },
            {
                data: "school_address"
            },
            {
                data: null,
                render: function(data, type, row) {
                    let btnEdit = `<a onclick="editFormSchool(${data.id})" class="btn bg-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>`;
                    let btnDelete = `<a onclick="deleteFormSchool(${data.id})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>`;
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

    $(document).on("click", "#btn-add-school", () => {
        addFormSchool();
    });

    // form validation
    $("#form-school").validate({
        rules: {
            school_name: {
                required: true
            },
            school_address: {
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

    $("#form-school").submit(function(e) {
        e.preventDefault();

        var validate = $(this).valid();

        if (!validate) {
            return;
        }
        const id = $("#id_school").val();
        if (method === "add") {
            url = "school";
        } else {
            url = `school/${id}`;
        }

        const data = $(this).serialize();

        $.post(url, data)
            .done(function(result) {
                if (result.success === true) {
                    swal("Success!", result.messages, "success");
                    $("#modal-school").modal("hide");
                } else {
                    swal("Oops", result.messages, "error");
                    $("#modal-school").modal("hide");
                }
                $("#modal-school").modal("hide");
                t.ajax.reload();
            })
            .fail(function() {
                swal("Oops", "Ajax Failed!", "error");
            });
    });
});
