@foreach ($documents as $document)
<div id="{{ $document->id }}" class="easyui-navpanel">
    <header>
        <div class="m-toolbar">
            <div class="m-left">
                <a href="#" class="easyui-linkbutton m-back" data-options="plain:true,outline:true,back:true">Back</a>
            </div>
            <div class="m-title">{{ $document->name }}</div>
        </div>
    </header>
    <iframe src="{{ route('mobile-document.view-file', ['id' => $document->id, 'filename' => $document->filename]) }}" width="100%" height="100%"></iframe>

    @if ($document->status === 0)
    <footer>
        <div class="m-buttongroup m-buttongroup-justified" style="width: 100%;">
            <a href="javascript:void(0);" class="easyui-linkbutton btnSendOtp" id="{{ $document->id }}" data-options="iconCls:'icon-large-ok',size:'large',iconAlign:'top',plain:true">Approve</a>
            <a href="javascript:void(0);" class="easyui-linkbutton btnReject" id="{{ $document->id }}" data-options="iconCls:'icon-large-cancel',size:'large',iconAlign:'top',plain:true">Reject</a>
        </div>
    </footer>
    @endif
</div>
@endforeach

<div id="dlg1" class="easyui-dialog" style="padding: 20px 6px; width: 70%;" data-options="inline:true,modal:true,closed:true,title:'Confirmation'">
    <div style="display: none;">
        <input class="easyui-textbox" id="document_id" name="document_id" />
    </div>
    <div style="margin-bottom: 10px;">
        <input class="easyui-textbox" id="otp" name="otp" prompt="OTP TOKEN" style="width: 100%; height: 30px;" />
    </div>
    <div class="dialog-button">
        <a href="javascript:void(0)" id="btnAccept" class="easyui-linkbutton" style="width: 100%; height: 35px;">OK, Approve</a>
    </div>
</div>