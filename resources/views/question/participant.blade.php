<!DOCTYPE html>
<html>
<head>
	<title>IPB Training</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Perhatian</strong> Ada Masalah Dalam Inputan.<br><br>
    </div>
        @endif
		<section class="inputnama">
			<div class="container">
				<div class="inputnama-content">
					<form action="/participant/kuesioner" method="POST" id="inputnama-form" class="inputnama-form">
                     {{csrf_field()}}
						<h2 class="form-title">Kuesioner Peserta</h2>
							<div class="form-group">
                                <label class="label" id="training-title">Event</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="training_title" data-dependent="training_title" id="training_title" class="form-control" value="{{ old('training_title') }}">
                                            <option checked="checked" selected="selected" disabled="true" >Select Event</option>
                                                @foreach($training_titles as $training_title )
                                                        <option value="{{$training_title->id}}">{{$training_title->training_title}}</option>
                                                @endforeach
                                        </select>
                                                @if ($errors->has('training_title'))
                                                    <small class="form-text text-danger">Please select an item in the list.</small>
                                                @endif
                                                <div class="select-dropdown"></div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="label">Name</label>
                                                        <select name="participant_name" id="participant_name"  class="form-control" data-dependent="participant_name">
                                                            <option  selected="selected" disabled="true" >Select Name</option>
                                                                <option  selected="selected" disabled="true" >Select Name</option>
                                                        </select>
                                                        @if ($errors->has('participant_name'))
                                                        <small class="form-text text-danger">Please select an item in the list.</small>
                                                        @endif
                                                </div>
                                                <br>
                                                    <div class="form-group">
                                                        <label class="label">Where did you find out about this Event information?</label>
                                                                <p><input type="radio" name="sumber_informasi" value="Surat undangan resmi yang diterima oleh kantor saya / Invitation Letter" {{(old('sumber_informasi') == 'Surat undangan resmi yang diterima oleh kantor saya / Invitation Letter') ? 'checked' : ''}}/>Surat undangan resmi yang diterima oleh kantor saya / Invitation Letter</p>
                                                                <p><input type="radio" name="sumber_informasi" value="web" {{(old('sumber_informasi') == 'web') ? 'checked' : ''}} />Web ipbtraining.com</p>
                                                                <p><input type="radio" name="sumber_informasi" value="linkedin" {{(old('sumber_informasi') == 'linkedin') ? 'checked' : ''}} />LinkedIn</p>
                                                                <p><input type="radio" name="sumber_informasi" value="facebook" {{(old('sumber_informasi') == 'facebook') ? 'checked' : ''}} />Facebook</p>
                                                                <p><input type="radio" name="sumber_informasi" value="whatsapp" {{(old('sumber_informasi') == 'whatsapp') ? 'checked' : ''}} />Whatsapp / Line</p>
                                                                <p><input type="radio" name="sumber_informasi" value="asosiasi" {{(old('sumber_informasi') == 'asosiasi') ? 'checked' : ''}} />Asosiasi / Organisasi</p>
                                                                <p><input type="radio" name="sumber_informasi" value="lainnya" {{(old('sumber_informasi') == 'lainnya') ? 'checked' : ''}} />lainnya
                                                                <input type="text" class="form-input" name="sumber_informasi_lainnya" value="{{old('sumber_informasi_lainnya')}}"  /></p>
                                                            @if ($errors->has('sumber_informasi'))
                                                            <small class="form-text text-danger">Please select one of these option.</small>
                                                            @endif
                                                        </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="label">My impression about this activity is?</label>
                                                        <br>
                                                        <textarea name="kesan" rows="5" cols="35" placeholder="Your Answer" >{{old('kesan')}}</textarea>
                                                        @if ($errors->has('kesan'))
                                                        <small class="form-text text-danger">Please fill out this field.</small>
                                                        @endif
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="label">Do you recommend this training for your friends? Let me know His/Her name and email/phone</label>
                                                        <div>
                                                        <input type="text" class="form-input" name="merekomendasikan" id="recommend" placeholder="Your Answer" value="{{old('merekomendasikan')}}" />
                                                        @if ($errors->has('merekomendasikan'))
                                                        <small class="form-text text-danger">Please fill out this field.</small>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="label">Write down the other training you need?</label>
                                                        <div>
                                                        <input type="text" class="form-input" name="request_pelatihan" id="need" value="{{old('request_pelatihan')}}" placeholder="Your Answer"/>
                                                        @if ($errors->has('request_pelatihan'))
                                                        <small class="form-text text-danger">Please fill out this field.</small>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    <br>
                                                    <hr width="50%" align="left">
                                                    <br>
                                                        <label class="label"><b>Commite Service?</b></label>
                                                    <br>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="label">Attitude</label>
                                                        <!-- <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span> -->
                                                        <p><input type='radio' name='layanan_panitia_sikap' value='1' {{(old('layanan_panitia_sikap') == '1') ? 'checked' : ''}}/>1</p>
                                                        <p><input type='radio' name='layanan_panitia_sikap' value='2' {{(old('layanan_panitia_sikap') == '2') ? 'checked' : ''}}/>2</p>
                                                        <p><input type='radio' name='layanan_panitia_sikap' value='3' {{(old('layanan_panitia_sikap') == '3') ? 'checked' : ''}}/>3</p>
                                                        <p><input type='radio' name='layanan_panitia_sikap' value='4' {{(old('layanan_panitia_sikap') == '4') ? 'checked' : ''}}/>4</p>
                                                        @if ($errors->has('layanan_panitia_sikap'))
                                                            <small class="form-text text-danger">Please select one of these option.</small>
                                                        @endif
                                                        <br>
                                                        <input type="text" class="form-input" name="layanan_panitia_sikap_komentar" id="attitude" placeholder="Your Comment" value="{{old('layanan_panitia_sikap_komentar')}}"/>
                                                        @if ($errors->has('layanan_panitia_sikap_komentar'))
                                                            <small class="form-text text-danger">Please fill out this field.</small>
                                                        @endif
                                                    </div>
                                                    </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="label">Job Performance and Quality?</label>
                                                            <div>
                                                            <!-- <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span> -->
                                                            <p><input type='radio' name='layanan_panitia_kinerja_kualitas' value='1' {{(old('layanan_panitia_kinerja_kualitas') == '1') ? 'checked' : ''}}/>1</p>
                                                            <p><input type='radio' name='layanan_panitia_kinerja_kualitas' value='2' {{(old('layanan_panitia_kinerja_kualitas') == '2') ? 'checked' : ''}}/>2</p>
                                                            <p><input type='radio' name='layanan_panitia_kinerja_kualitas' value='3' {{(old('layanan_panitia_kinerja_kualitas') == '3') ? 'checked' : ''}}/>3</p>
                                                            <p><input type='radio' name='layanan_panitia_kinerja_kualitas' value='4' {{(old('layanan_panitia_kinerja_kualitas') == '4') ? 'checked' : ''}}/>4</p>
                                                            @if ($errors->has('layanan_panitia_kinerja_kualitas'))
                                                                <small class="form-text text-danger">Please select one of these option.</small>
                                                            @endif
                                                            <br>
                                                        <input type="text" class="form-input" name="layanan_panitia_kinerja_kualitas_komentar" id="quality" placeholder="Your Comment" value="{{old('layanan_panitia_kinerja_kualitas_komentar')}}" />
                                                            @if ($errors->has('layanan_panitia_kinerja_kualitas_komentar'))
                                                                <small class="form-text text-danger">Please fill out this field.</small>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="label"><b>Event Materials to suit your needs?</b></label>
                                                            <div>
                                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                                            <!-- <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span> -->
                                                            <p><input type='radio' name='materi' value='1' {{(old('materi') == '1') ? 'checked' : ''}}/>1</p>
                                                            <p><input type='radio' name='materi' value='2' {{(old('materi') == '2') ? 'checked' : ''}}/>2</p>
                                                            <p><input type='radio' name='materi' value='3' {{(old('materi') == '3') ? 'checked' : ''}}/>3</p>
                                                            <p><input type='radio' name='materi' value='4' {{(old('materi') == '4') ? 'checked' : ''}}/>4</p>
                                                                @if ($errors->has('materi'))
                                                                <small class="form-text text-danger">Please select one of these option.</small>
                                                                @endif
                                                            <br>
                                                        <input type="text" class="form-input" name="materi_komentar" id="suit" placeholder="Your Comment" value="{{old('materi_komentar')}}"/>
                                                            @if ($errors->has('materi_komentar'))
                                                                <small class="form-text text-danger">Please fill out this field.</small>
                                                            @endif
                                                        </div>
                                                        </div>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
</body>
</html>

<script>
 $('#training_title').on('change', function(e){
    console.log(e);

    var title = e.target.value;

    $.get('/ajax-name?title=' + title, function(data){
      $('#participant_name').empty();
      $('#participant_name').append('<option value="" disabled="true" selected> Select Name </option>');
      $.each(data, function(index, subcatObj){
        $('#participant_name').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
      });
    });

 });
</script>
