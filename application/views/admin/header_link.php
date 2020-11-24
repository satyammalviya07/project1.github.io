<link rel="shortcut icon" href="<?= base_url('Assets/admin/images/icon/sq.png')?>">
<link href="<?= base_url('Assets/admin/libs/flatpickr/flatpickr.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('Assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('Assets/admin/css/icons.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('Assets/admin/css/app.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('Assets/admin/libs/jquery-toast/jquery.toast.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('Assets/admin/libs/footable/footable.core.min.css') ?>" rel="stylesheet" type="text/css"/>
<style>
	#snackbar {
		visibility: hidden;
		min-width: 250px;
		margin-left: -125px;
		background-color: #333;
		color: #fff;
		text-align: center;
		border-radius: 2px;
		padding: 16px;
		position: fixed;
		z-index: 1;
		left: 50%;
		bottom: 30px;
		font-size: 17px;
	}

	#snackbar.show {
		visibility: visible;
		-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
		animation: fadein 0.5s, fadeout 0.5s 2.5s;
	}

	@-webkit-keyframes fadein {
		from {
			bottom: 0;
			opacity: 0;
		}
		to {
			bottom: 30px;
			opacity: 1;
		}
	}

	@keyframes fadein {
		from {
			bottom: 0;
			opacity: 0;
		}
		to {
			bottom: 30px;
			opacity: 1;
		}
	}

	@-webkit-keyframes fadeout {
		from {
			bottom: 30px;
			opacity: 1;
		}
		to {
			bottom: 0;
			opacity: 0;
		}
	}

	@keyframes fadeout {
		from {
			bottom: 30px;
			opacity: 1;
		}
		to {
			bottom: 0;
			opacity: 0;
		}
	}


</style>
<style>
	.file-upload {
		display: block;
		text-align: center;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12px;
	}

	.file-upload .file-select {
		display: block;
		border: 2px solid #dce4ec;
		color: #34495e;
		cursor: pointer;
		height: 40px;
		line-height: 40px;
		text-align: left;
		background: #FFFFFF;
		overflow: hidden;
		position: relative;
	}

	.file-upload .file-select .file-select-button {
		background: #dce4ec;
		padding: 0 10px;
		display: inline-block;
		height: 40px;
		line-height: 40px;
	}

	.file-upload .file-select .file-select-name {
		line-height: 40px;
		display: inline-block;
		padding: 0 10px;
	}

	.file-upload .file-select:hover {
		border-color: #34495e;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload .file-select:hover .file-select-button {
		background: #34495e;
		color: #FFFFFF;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload.active .file-select {
		border-color: #3fa46a;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload.active .file-select .file-select-button {
		background: #3fa46a;
		color: #FFFFFF;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload .file-select input[type=file] {
		z-index: 100;
		cursor: pointer;
		position: absolute;
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		filter: alpha(opacity=0);
	}

	.file-upload .file-select.file-select-disabled {
		opacity: 0.65;
	}

	.file-upload .file-select.file-select-disabled:hover {

		display: block;
		border: 2px solid #dce4ec;
		color: #34495e;
		cursor: pointer;
		height: 40px;
		line-height: 40px;
		margin-top: 5px;
		text-align: left;
		background: #FFFFFF;
		overflow: hidden;
		position: relative;
	}

	.file-upload .file-select.file-select-disabled:hover .file-select-button {
		background: #dce4ec;
		color: #666666;
		padding: 0 10px;
		display: inline-block;
		height: 40px;
		line-height: 40px;
	}

	.file-upload .file-select.file-select-disabled:hover .file-select-name {
		line-height: 40px;
		display: inline-block;
		padding: 0 10px;
	}

	.form-group p {
		font-size: 16px;
	}
	/*#topnav .topbar-menu {*/
	/*	margin-top: 0px;*/
	/*}*/
</style>
