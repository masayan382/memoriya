$(".js-add-todo").on("click", function(e) {
  e.preventDefault();

  // inputの値を取得し、中身を空にする
  var text = $(".js-get-val").val();
  $(".js-get-val").val("");

  // 入力が空の場合
  if (!text) {
    // エラーを表示
    $(".js-toggle-error").show();
    return;
  }

  // エラーを隠す（表示されているかもしれないので）
  $(".js-toggle-error").hide();

  // listItemのhtmlを生成してタスクに追加する
  var listItem =
    '<li class="list__item js-todo_list-item" data-text="' +
    text +
    '">' +
    '<i class="fa fa-square-o icon-check js-click-done" aria-hidden="true"></i>' +
    '<span class="js-todo_list-text">' +
    text +
    "</span>" +
    '<input type="text" class="editText js-todo_list-editForm" value="' +
    text +
    '">' +
    '<i class="fa fa-trash icon-trash js-click-trash" aria-hidden="true"></i>' +
    "</li>";

  $(".js-todo_list").prepend(listItem);
});

$(document).on("click", ".js-click-done", function() {
  $(this)
    .removeClass("fa-square-o")
    .addClass("fa-check-square")
    .removeClass("js-click-done")
    .addClass("js-click-todo")
    .closest(".js-todo_list-item")
    .addClass("list__item--done");
});

$(document).on("click", ".js-click-todo", function() {
  $(this)
    .addClass("fa-square-o")
    .removeClass("fa-check-square")
    .addClass("js-click-done")
    .removeClass("js-click-todo")
    .closest(".js-todo_list-item")
    .removeClass("list__item--done");
});

$(document).on("click", ".js-click-trash", function() {
  $(this)
    .closest(".js-todo_list-item")
    .fadeOut("slow", function() {
      this.remove();
    });
});

$(document).on("click", ".js-todo_list-text", function() {
  $(this)
    .hide()
    .siblings(".js-todo_list-editForm")
    .show();
});

$(document).on("keyup", ".js-todo_list-editForm", function(e) {
  if (e.keyCode === 13 && e.shiftKey === true) {
    var $this = $(this);
    $this
      .hide()
      .siblings(".js-todo_list-text")
      .text($this.val())
      .show()
      .closest(".js-todo_list-item")
      .attr("data-text", $this.val());
  }
});

$(".js-search").on("keyup", function() {
  var searchText = $(this).val();

  $(".js-todo_list-item")
    .show()
    .each(function(i, elm) {
      var text = $(elm).data("text");
      var regexp = new RegExp("^" + searchText);

      if (text && text.match(regexp)) {
        return true;
      }
      $(elm).hide();
    });
});
