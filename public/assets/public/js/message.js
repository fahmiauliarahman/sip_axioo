var t, method;

function viewFormMessage(id) {
    $.get(`message/${id}`, function(result) {
        $("#modal-message").modal("show");
        debugger;
        $(".name").text(result.name);
        $(".email").text(result.email);
        $(".website").text(result.website);
        $(".message").text(result.message);
    });
}

function deleteFormMessage(id) {
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
            $.post(`message/${id}`, data)
                .done(function(result) {
                    if (result.success === true) {
                        swal("Success!", result.messages, "success");
                        t.ajax.reload();
                    } else {
                        swal("Oops", result.messages, "error");
                    }
                    $("#modal-message").modal("hide");
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
    t = $("#tbl-message").DataTable({
        ajax: {
            url: "message_data",
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
                data: "name"
            },
            {
                data: "email"
            },
            {
                data: "message"
            },
            {
                data: null,
                render: function(data, type, row) {
                    let btnView = `<a onclick="viewFormMessage(${data.id})" class="btn bg-success btn-sm mr-1"><i class="fa fa-eye"></i></a>`;
                    let btnDelete = `<a onclick="deleteFormMessage(${data.id})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>`;
                    return btnView + btnDelete;
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
});
