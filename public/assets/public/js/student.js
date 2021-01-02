var t, method;
const schoolSelect = $("#school_id");
const departmentSelect = $("#dept_id");

function getSchoolData() {
    $.get("school_data", result => {
        schoolSelect.empty();
        $.each(result, function(k, v) {
            schoolSelect.append(
                `<option value="${v["id"]}">${v["school_name"]}</option>`
            );
        });
    });
}

function getDeptData() {
    $.get("department_data", result => {
        departmentSelect.empty();
        $.each(result, function(k, v) {
            departmentSelect.append(
                `<option value="${v["id"]}">${v["dpt_name"]}</option>`
            );
        });
    });
}

function disableInput() {
    $("#btn-add-department").hide();
    $("#btn-add-school").hide();
    $("#btn-save-student").hide();
    $("#modal-student :input").attr("readonly", true);
}

function enableInput() {
    $("#btn-add-department").show();
    $("#btn-add-school").show();
    $("#btn-save-student").show();
    $("#modal-student :input").removeAttr("readonly");
}

function viewFormStudent(id) {
    disableInput();
    $.get(`student/${id}/`, function(data) {
        debugger;
        $("#modal-student").modal("show");
        $(".modal-title").text(`View Student: ${data.full_name}`);
        $("#id_student").val(data.id);
        $("#name").val(data.full_name);
        $("#phone_number").val(data.phone_num);
        $("#school_id").val(data.school_id);
        $("#grade").val(data.grade);
        $("#email").val(data.email);
        $("#dept_id").val(data.department_id);
    });
    $("#modal-student form")[0].reset();

    $("#modal-student").modal("show");
}

function addFormStudent() {
    enableInput();
    method = "add";
    $("input[name=_method]").val("POST");
    $("#modal-student").modal("show");
    $("#modal-student form")[0].reset();
    $(".modal-title").text("Add New Student");
}

function editFormStudent(id) {
    enableInput();
    method = "edit";
    $("input[name=_method]").val("PATCH");
    $("#modal-student form")[0].reset();
    $.get(`student/${id}/`, function(data) {
        $("#modal-student").modal("show");
        $(".modal-title").text(`Edit Student: ${data.full_name}`);
        $("#id_student").val(data.id);
        $("#name").val(data.full_name);
        $("#phone_number").val(data.phone_num);
        $("#school_id").val(data.school_id);
        $("#grade").val(data.grade);
        $("#email").val(data.email);
        $("#dept_id").val(data.department_id);
    });
}

function deleteFormStudent(id) {
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
            $.post(`student/${id}`, data)
                .done(function(result) {
                    if (result.success === true) {
                        swal("Success!", result.messages, "success");
                        t.ajax.reload();
                    } else {
                        swal("Oops", result.messages, "error");
                    }
                    $("#modal-student").modal("hide");
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
    getSchoolData();
    getDeptData();
    $(document).on("click", "#btn-submit-school", () => {
        setTimeout(() => {
            getSchoolData();
        }, 100);
    });
    $(document).on("click", "#btn-submit-department", () => {
        setTimeout(() => {
            getDeptData();
        }, 100);
    });
    t = $("#tbl-student").DataTable({
        ajax: {
            url: "student_data",
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
                data: "full_name"
            },
            {
                data: "school_name"
            },
            {
                data: null,
                render: function(data) {
                    return `Kelas ${data.grade}`;
                }
            },
            {
                data: "dpt_name"
            },
            {
                data: null,
                render: function(data, type, row) {
                    let btnView = `<a onclick="viewFormStudent(${data.id})" class="btn bg-success btn-sm mr-1"><i class="fa fa-eye"></i></a>`;
                    let btnEdit = `<a onclick="editFormStudent(${data.id})" class="btn bg-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>`;
                    let btnDelete = `<a onclick="deleteFormStudent(${data.id})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>`;
                    return btnView + btnEdit + btnDelete;
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

    $(document).on("click", "#btn-add-student", () => {
        addFormStudent();
    });

    // form validation
    $("#form-student").validate({
        rules: {
            name: {
                required: true
            },
            phone_number: {
                required: true
            },
            school_id: {
                required: true
            },
            grade: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            department_id: {
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

    $("#form-student").submit(function(e) {
        e.preventDefault();

        var validate = $(this).valid();

        if (!validate) {
            return;
        }
        const id = $("#id_student").val();
        if (method === "add") {
            url = "student";
        } else {
            url = `student/${id}`;
        }

        const data = $(this).serialize();

        $.post(url, data)
            .done(function(result) {
                debugger;
                if (result.success === true) {
                    swal("Success!", result.messages, "success");
                    $("#modal-student").modal("hide");
                } else {
                    swal("Oops", result.messages, "error");
                    $("#modal-student").modal("hide");
                }
                $("#modal-student").modal("hide");
                t.ajax.reload();
            })
            .fail(function() {
                swal("Oops", "Ajax Failed!", "error");
            });
    });
});
