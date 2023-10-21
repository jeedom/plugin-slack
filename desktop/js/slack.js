
/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */
document.querySelector('div.callback a.decrypt').addEventListener('click', function() {
    this.parentNode.querySelectorAll('span').forEach(function(e) {
      e.classList.toggle('encrypt')
    })
    this.querySelector('i').classList.toggle('fa-eye-slash')
  })
 function addCmdToTable(_cmd) {
    if (!isset(_cmd)) {
        var _cmd = {configuration: {}};
    }
    if (!isset(_cmd.configuration)) {
        _cmd.configuration = {};
    }
    var tr = '<tr class="cmd" data-cmd_id="' + init(_cmd.id) + '">';
    tr += '<td class="hidden-xs">'
    tr += '<span class="cmdAttr" data-l1key="id"></span>'
     tr += '<td>'
     tr += '<div class="input-group">'
     tr += '<input class="cmdAttr form-control input-sm roundedLeft" data-l1key="name" placeholder="{{Nom de la commande}}">'
     tr += '<span class="input-group-btn"><a class="cmdAction btn btn-sm btn-default" data-l1key="chooseIcon" title="{{Choisir une icône}}"><i class="fas fa-icons"></i></a></span>'
     tr += '<span class="cmdAttr input-group-addon roundedRight" data-l1key="display" data-l2key="icon" style="font-size:19px;padding:0 5px 0 0!important;"></span>'
     tr += '</div>'
     tr += '<td>';
     if (!isset(_cmd.type) || _cmd.type == 'action') {
         tr += '<input class="cmdAttr form-control input-sm" data-l1key="configuration" data-l2key="webhook" placeholder="{{Webhook}}"></td>';
     }
     tr += '</td>';
     tr += '<td>';
     if (!isset(_cmd.type) || _cmd.type == 'action') {
         tr += '<input class="cmdAttr form-control input-sm" data-l1key="configuration" data-l2key="destination" placeholder="{{Destination}}"></td>';
     }
     tr += '</td>';
     tr += '<td>';
        if (is_numeric(_cmd.id)) {
            tr += '<a class="btn btn-default btn-xs cmdAction" data-action="configure" title="{{Configuration avancée}}"><i class="fas fa-cogs"></i></a> ';
            tr += '<a class="btn btn-default btn-xs cmdAction" data-action="test"><i class="fas fa-rss"></i> {{Tester}}</a>';
        }
     tr += '<i class="fas fa-minus-circle pull-right cmdAction cursor" data-action="remove"></i>';
     tr += '</td>';
     tr += '</tr>';
     $('#table_cmd tbody').append(tr);
     $('#table_cmd tbody tr:last').setValues(_cmd, '.cmdAttr');
     if (isset(_cmd.type)) {
         $('#table_cmd tbody tr:last .cmdAttr[data-l1key=type]').value(init(_cmd.type));
     }
     jeedom.cmd.changeType($('#table_cmd tbody tr:last'), init(_cmd.subType));
 }