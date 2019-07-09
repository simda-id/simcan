$(function() {

    var datascource = {
      @foreach($data as $datas)
        'name': 'Visi',
        'title': '{{ $datas->uraian_visi_rpjmd }}',
        'className': 'level1',
        'nodeTitle': 'name',
        'nodeContent': 'title',
        'children': [
            @foreach($datas->TrxRpjmdMisis as $misi)
                {'name': 'Misi {{ $misi->no_urut }}','title': '{{ $misi->uraian_misi_rpjmd}}','className': 'level2',
                'children': [
                    @foreach($misi->TrxRpjmdTujuans as $tujuan)
                        {'name': 'Tujuan {{ $tujuan->no_urut }}','title': '{{ $tujuan->uraian_tujuan_rpjmd}}','className': 'level3',
                        'children': [
                            @foreach($tujuan->TrxRpjmdSasarans as $sasaran)
                                {'name': 'Sasaran {{ $sasaran->no_urut }}','title': '{{ $sasaran->uraian_sasaran_rpjmd}}','className': 'level4',
                                'children': [
                                    @foreach($sasaran->TrxRpjmdPrograms as $program)
                                        {'name': 'Program {{ $program->no_urut }}','title': '{{ $program->uraian_program_rpjmd}}',},
                                    @endforeach
                                ]},
                            @endforeach
                        ]},
                    @endforeach
                    ]},
            @endforeach
        ]
      @endforeach
     };

    var oc = $('#pk').orgchart({
        'data' : datascource,
        'nodeContent': 'title',
        'pan': true,
        'zoom': true,        
        'exportButton': true,
        'exportFilename': 'ChartRPJMD'
    });
    oc.hideChildren(oc.$chartContainer.find('.node:first'));
    oc.$chartContainer.on('touchmove', function(event) {
      event.preventDefault();
    });

  });