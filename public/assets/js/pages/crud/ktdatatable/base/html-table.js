'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      columns: [
        {
          field: 'DepositPaid',
          type: 'number',
        },
        {
          field: 'OrderDate',
          type: 'date',
          format: 'YYYY-MM-DD',
        }, {
          field: 'Etat',
          title: 'Etat',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'ouvert',
                'class': ' label-light-primary',
              },
              2: {
                'title': 'fermé',
                'class': ' label-light-success',
              },
              3: {
                'title': 'en cours',
                'class': ' label-light-info',
              },
              4: {
                'title': 'non résolu',
                'class': ' label-light-danger',
              },
            };
            return '<span class="label font-weight-bold label-lg' + status[row.Etat].class + ' label-inline">' + status[row.Etat].title + '</span>';
          },
        }, {
          field: 'Importance',
          title: 'Importance',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Haut',
                'state': 'danger',
              },
              2: {
                'title': 'Moyen',
                'state': 'warning',
              },
              3: {
                'title': 'Bas',
                'state': 'primary',
              },
            };
            return '<span class="label label-' + status[row.Importance].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Importance].state + '">' + status[row.Importance].title + '</span>';
          },
        },
      ],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Etat');
    });

    $('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Importance');
    });

    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});
