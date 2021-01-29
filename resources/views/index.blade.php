@extends('layouts.app')
@section('content')

<div class="row">
<div class="col-12">	
	<div class="card" style=" background: linear-gradient( #ffdde1, #74ebd5, #ACB6E5);">
			<div class="card-body">
				<h3 class="text-center" style="padding: 20px;  color: #2a3f54; font-weight: bolder; font-size: 20px;">Selamat Datang di Sistem Inventaris Sentuh Digital Teknologi</h3>
			</div>
		</div>
		</div>
	<div class="col-lg-3">
		<div class="card" style="background: linear-gradient(#74ebd5, #ACB6E5);">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="ti-desktop" style="margin: -25px; color: #2a3f54; "></i>
					</div>
				</div>
				<div class="stat-content">
					<div class="stat-left dib">
						<div class="stat-text" style="margin:0 0 5px 70px;"><span class="count"></span> item</div>
						<div class="stat-heading" style="margin-left: 70px;">Hardware</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">	
		<div class="card" style=" background: linear-gradient(to top, #ee9ca7, #ffdde1);">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="ti-printer"  style="margin: -25px; color: #2a3f54;"></i>
					</div>
				</div>
				<div class="stat-content">
					<div class="stat-left dib">
						<div class="stat-text" style="margin:0 0 5px 70px;"><span class="count"></span> item</div>
						<div class="stat-heading" style="margin-left: 70px;">Elektronik</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card" style="background: linear-gradient(#74ebd5, #ACB6E5);">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="ti-home"  style="margin: -25px; color: #2a3f54;"></i>
					</div>
				</div>
				<div class="stat-content">
					<div class="stat-left dib">
						<div class="stat-text" style="margin:0 0 5px 70px;"><span class="count"></span> item</div>
						<div class="stat-heading" style="margin-left: 70px;">Furniture</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="card"  style=" background: linear-gradient(to top, #ee9ca7, #ffdde1);">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="ti-more"  style="margin: -25px; color: #2a3f54;"></i>
					</div>
				</div>
				<div class="stat-content">
					<div class="stat-left dib">
						<div class="stat-text" style="margin:0 0 5px 70px;"><span class="count"></span> item</div>
						<div class="stat-heading" style="margin-left: 70px;">Etc</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection