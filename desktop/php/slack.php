<?php
if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}
$plugin = plugin::byId('slack');
sendVarToJS('eqType', $plugin->getId());
$eqLogics = eqLogic::byType($plugin->getId());
?>
<style>
	div.callback span.encrypt {
		font-family: "text-security-disc" !important;
	}
</style>

<div class="row row-overflow">
	<div class="col-xs-12 eqLogicThumbnailDisplay">
		<legend><i class="fas fa-cog"></i> {{Gestion}}</legend>
		<div class="eqLogicThumbnailContainer">
			<div class="cursor eqLogicAction logoPrimary" data-action="add">
				<i class="fas fa-plus-circle"></i>
				<br />
				<span>{{Ajouter}}</span>
			</div>
			<?php
			$jeedomVersion  = jeedom::version() ?? '0';
			$displayInfo = version_compare($jeedomVersion, '4.4.0', '>=');
			if ($displayInfo) {
				echo '<div class="cursor eqLogicAction info" data-action="createCommunityPost">';
				echo '<i class="fas fa-ambulance"></i><br>';
				echo '<span>{{Community}}</span>';
				echo '</div>';
			}
			?>
		</div>
		<legend><i class="fas fa-phone"></i> {{Mes Slack}}</legend>
		<div class="input-group" style="margin:5px;">
			<input class="form-control roundedLeft" placeholder="{{Rechercher}}" id="in_searchEqlogic" />
			<div class="input-group-btn">
				<a id="bt_resetSearch" class="btn" style="width:30px"><i class="fas fa-times"></i>
				</a><a class="btn hidden roundedRight" id="bt_pluginDisplayAsTable" data-coreSupport="1" data-state="0"><i class="fas fa-grip-lines"></i></a>
			</div>
		</div>
		<div class="eqLogicThumbnailContainer">
			<?php
			foreach ($eqLogics as $eqLogic) {
				$opacity = ($eqLogic->getIsEnable()) ? '' : 'disableCard';
				echo '<div class="eqLogicDisplayCard cursor ' . $opacity . '" data-eqLogic_id="' . $eqLogic->getId() . '" >';
				echo '<img src="' . $plugin->getPathImgIcon() . '" />';
				echo '<br>';
				echo '<span class="name">' . $eqLogic->getHumanName(true, true) . '</span>';
				echo '<span class="hidden hiddenAsCard displayTableRight">';
				echo ($eqLogic->getIsVisible() == 1) ? '<i class="fas fa-eye" title="{{Équipement visible}}"></i>' : '<i class="fas fa-eye-slash" title="{{Équipement non visible}}"></i>';
				echo '</span>';
				echo '</div>';
			}
			?>
		</div>
	</div>
	<div class="col-xs-12 eqLogic" style="display: none;">
		<div class="input-group pull-right" style="display:inline-flex">
			<span class="input-group-btn">
				<a class="btn btn-sm btn-default eqLogicAction roundedLeft" data-action="configure"><i class="fas fa-cogs"></i> {{Configuration avancée}}
				</a><a class="btn btn-sm btn-default eqLogicAction" data-action="copy"><i class="fas fa-copy"></i> {{Dupliquer}}
				</a><a class="btn btn-sm btn-success eqLogicAction" data-action="save"><i class="fas fa-check-circle"></i> {{Sauvegarder}}
				</a><a class="btn btn-sm btn-danger eqLogicAction roundedRight" data-action="remove"><i class="fas fa-minus-circle"></i> {{Supprimer}}
				</a>
			</span>
		</div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a class="eqLogicAction cursor" aria-controls="home" role="tab" data-action="returnToThumbnailDisplay"><i class="fas fa-arrow-circle-left"></i></a></li>
			<li role="presentation" class="active"><a href="#eqlogictabin" aria-controls="home" role="tab" data-toggle="tab"><i class="fas fa-tachometer-alt"></i> {{Equipement}}</a></li>
			<li role="presentation"><a href="#commandtab" aria-controls="profile" role="tab" data-toggle="tab"><i class="fas fa-list"></i> {{Commandes}}</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="eqlogictabin">
				<form class="form-horizontal">
					<fieldset>
						<div class="col-lg-6">
							<legend><i class="fas fa-wrench"></i> {{Paramètres généraux}}</legend>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Nom de l'équipement}}</label>
								<div class="col-sm-6">
									<input type="text" class="eqLogicAttr form-control" data-l1key="id" style="display:none;">
									<input type="text" class="eqLogicAttr form-control" data-l1key="name" placeholder="{{Nom de l'équipement}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Objet parent}}</label>
								<div class="col-sm-6">
									<select id="sel_object" class="eqLogicAttr form-control" data-l1key="object_id">
										<option value="">{{Aucun}}</option>
										<?php
										$options = '';
										foreach ((jeeObject::buildTree(null, false)) as $object) {
											$options .= '<option value="' . $object->getId() . '">' . str_repeat('&nbsp;&nbsp;', $object->getConfiguration('parentNumber')) . $object->getName() . '</option>';
										}
										echo $options;
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Catégorie}}</label>
								<div class="col-sm-6">
									<?php
									foreach (jeedom::getConfiguration('eqLogic:category') as $key => $value) {
										echo '<label class="checkbox-inline">';
										echo '<input type="checkbox" class="eqLogicAttr" data-l1key="category" data-l2key="' . $key . '" >' . $value['name'];
										echo '</label>';
									}
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Options}}</label>
								<div class="col-sm-6">
									<label class="checkbox-inline"><input type="checkbox" class="eqLogicAttr" data-l1key="isEnable" checked>{{Activer}}</label>
									<label class="checkbox-inline"><input type="checkbox" class="eqLogicAttr" data-l1key="isVisible" checked>{{Visible}}</label>
								</div>
							</div>
							<legend><i class="fas fa-cogs"></i> {{Paramètres spécifiques}}</legend>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Domaine}}</label>
								<div class="col-sm-6">
									<input type="text" class="eqLogicAttr form-control" data-l1key="logicalId" placeholder="{{Nom du domaine}}" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">{{Authentification token}}</label>
								<div class="col-sm-6">
									<input type="text" class="form-control eqLogicAttr" data-l1key="configuration" data-l2key="oauth_token" placeholder="{{Token}}" />
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<legend><i class="fas fa-info"></i> {{Informations}}</legend>
							<div>
								<center>
									<img src="<?php echo $plugin->getPathImgIcon(); ?>" id="img_netatmoModel" style="width:120px" />
								</center>
							</div>
							<legend><i class="fas fa-at"></i> {{URL de retour}}</legend>
							<div class="form-group">
								<div class="alert alert-info col-xs-10 col-xs-offset-1 text-center callback">
									<a class="btn btn-default btn-xs decrypt pull-right" data-plugin="slack"><i class="fas fa-eye"></i></a>
									<?php echo '<span class="encrypt">' . network::getNetworkAccess('external') . '</span>/plugins/slack/core/php/jeeSlack.php?apikey=<span class="encrypt">' . jeedom::getApiKey($plugin->getId());
									?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>

			</div>
			<div role="tabpanel" class="tab-pane" id="commandtab">
				<a class="btn btn-success btn-sm cmdAction pull-right" data-action="add" style="margin-top:5px;"><i class="fas fa-plus-circle"></i> {{Ajouter une commande}}</a>
				<br><br>
				<table id="table_cmd" class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th style="width: 50px;"> ID</th>
							<th style="width: 230px;">{{Nom}}</th>
							<th style="width: 450px;">{{Webhook}}</th>
							<th style="width: 450px;">{{Destination}}</th>
							<th style="min-width:80px;width:140px;">{{Actions}}</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>
		</div>

	</div>
</div>
<?php
include_file('desktop', 'slack', 'js', 'slack');
include_file('core', 'plugin.template', 'js');
?>