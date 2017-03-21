function cart() {
  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    this.addItem();
    this.changeNumberAdd();
    this.changeNumberMinus();
    this.updateQuantityAdd();
    this.updateQuantityMinus();
    this.deleteItem();
  }

  this.addItem = function() {
    $('.add-cart').on('click', function(event) {
      event.preventDefault();
      var dataId = $(this).data('id');
      var dataNumber = parseInt($('.number').html());
      $.ajax({
        url: '/user/cart/addItem',
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId,
          number: dataNumber
        },
        complete: function (data) {
          switch (data.status) {
            case 200:
              alert(lang['cart']['add_success']);
              break;
            case 401:
              alert(lang['cart']['unauthenticated']);
              break;
            case 404:
              alert(lang['not_found']);
              break;
            default:
              alert(lang['error']);
              break;
          }
        }
      });
    });
  }

  this.changeNumberAdd = function() {
    $('.operator-add').on('click', function() {
      var number = parseInt($('.number').html());
      var sum = parseInt($('.avarible-product span.sum').html());
      if (number >= sum) {
        number = sum;
      } else {
        number += 1; 
      }
      $('.number').html(number);
    });
  }

  this.changeNumberMinus = function() {
    $('.operator-minus').on('click', function() {
      var number = parseInt($('.number').html());
      if (number <= 1) {
        number = 1;
      } else {
        number -= 1; 
      }
      $('.number').html(number);
    });
  }

  this.updateQuantityAdd = function() {
    var dataId;
    $('#cart').on('click', '.cart-quantity.up', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: '/user/cart/upQuantity',
        type: 'POST',
        data: {
          id: dataId
        }
      })
      .done(function(data) {
        $('#cart').html(data);
      });
    });
  }

  this.updateQuantityMinus = function() {
    var dataId;
    $('#cart').on('click', '.cart-quantity.down', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: '/user/cart/downQuantity',
        type: 'POST',
        data: {
          id: dataId
        }
      })
      .done(function(data) {
        $('#cart').html(data);
      });
    });
  }

  this.deleteItem = function() {
    var dataId;
    $('#cart').on('click', '.delete', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: '/user/cart/deleteItem',
        type: 'POST',
        data: {
          id: dataId
        },
        success: function(data) {
          $('#cart').html(data);
          alert(lang['delete_success']);
        }
      })
      $(this).parent().parent().remove();
    });
  };  
}
