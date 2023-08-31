<div id="documentReject" class="easyui-navpanel">
    <header>
        <div class="m-toolbar">
            <div class="m-left">
                <a href="#home" class="easyui-linkbutton m-back" data-options="plain:true,outline:true,back:true">Back</a>
            </div>
            <div class="m-title">Document Rejected</div>
        </div>
    </header>
    
    <ul class="easyui-tree" data-options="animate:true">
        @foreach ($companyRejects as $company)
        <li>
            <span>{{ $company->company }}</span>
            <ul>
                @foreach ($company->divisions as $division)
                <li data-options="state:'closed'">
                    <span>{{ $division->division }}</span>
                    <ul>
                        @foreach ($division->depts as $dept)
                        <li data-options="state:'closed'">
                            <span>{{ $dept->dept }}</span>
                            <ul>
                                @foreach ($dept->documents as $document)
                                <li>
                                    <a href="javascript:void(0)" onclick="$.mobile.go('#{{$document->id}}')">{{ $document->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</div>