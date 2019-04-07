@extends('layout.base')
@section('title') 投诉 @stop
@section('content')
<style>
    .title1{color: #666;margin: 10px 0;padding-left: 15px;}
</style>
<form id="form1">
    <div class="row" style="margin-top: 10px;margin-left: 0;margin-right: 0;">
        <div class="col-12" style="padding: 0;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">选择文件(png,jpg,最多9张)</label>
                    </div>
                    <div class="row" id="image_row" style="margin-bottom: 10px;">

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="btn btn-light" style="border: 2px dashed #999999; color: #999999; width: 100px;height: 100px;position: relative;font-size: 85px;line-height: 65px;">
                                <input type="file" id="files" multiple="multiple" accept="image/x-png,image/jpeg"
                                       onchange="on_file_select(event)" style="width: 100%;height: 100%;position: absolute;left: 0;top: 0;opacity: 0;"/>
                                +

                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group">
                        <label for="content">投诉内容(必填)</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        <input type="text" id="identifier" name="identifier" value="{{$_GET['identifier']??''}}" style="display: none;"/>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;">
        <button id="submitButton" type="button" class="btn btn-block btn-success" onclick="submit1()">提交</button>
    </div>

    <script>
        function remove_tmp_image(obj) {
            $(obj).parent().parent().remove();
        }
        function on_file_select(evt) {
            console.log('select image.');
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                console.log(f);
                var reader = new FileReader();
                reader.fileName = f.name;
                reader.type = f.type;

                reader.onload = function (e) {
                    if( e.target.type == 'image/jpeg' || e.target.type == 'image/png' )
                    {
                        $('<div class="col-4"><div class="card">' +
                            '<a href="javascript:void(0);" onclick="remove_tmp_image(this)"> ' +
                            '<img class="card-img-top img_preview" src="'+e.target.result+'" ' +
                            ' filename="'+e.target.fileName+'"' +
                            ' type="'+e.target.type+'"/></a></div></div>')
                            .appendTo($('#image_row'));
                    }
                    else
                    {
                    }
                };
                reader.readAsDataURL(f);
            }
        }
        function submit1()
        {
            var data = $('#form1').serializeArray();

            $('#image_row img').each(function (i) {
                data.push( {name:'filedata[]', value:$(this).attr('src')} );
            });
            $('#image_row img').each(function (i) {
                data.push( {name:'filenames[]', value:$(this).attr('filename')} );
            });

            $.ajax({
                url:'{{route('complaint.submit')}}',
                type:'POST',
                dataType:'json',
                data:data,
                cache: false,
                beforeSend:function()
                {
                    $('#submitButton').prop('disabled', true);
                },
                complete:function(){
                    $('#submitButton').prop('disabled', false);
                },
                success:function (response) {
                    if(response.success == true )
                    {
                        window.location = '{{route('complaint.submit.success')}}';
                    }
                    else
                    {
                        alert(response.msg);
                    }
                },
                error: function (res) {
                    var err = res.responseJSON, msgs = [];
                    try {
                        for (var k2 in err['errors']) {
                            if (err['errors'].hasOwnProperty(k2)) {
                                msgs.push(err['errors'][k2]);
                            }
                        }
                    } catch (e) {
                        if (err.error) {
                            for (var key in err.error) {
                                if (!err.hasOwnProperty(key)) {
                                    continue;
                                }
                                msgs.push(err.error[key]);
                            }
                        }
                    }

                    alert( msgs.join('\n'));
                }
            })
        }
    </script>
</form>

@stop