<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12 order-lg-1  order-sm-2 order-2">
                <div class="card shadow-sm">
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">Apercu</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-opration d-flex justify-content-end flex-column flex-sm-row">
                            
                            <div class="btn-group me-sm-2 mb-2 zindex-popover">
                                <input type="text" value="" class="form-control" wire:model="search" >
                            </div>
                            
                            <div class="btn-group me-sm-2 mb-2 zindex-popover">
                                <a href="{{ route('categorie.create') }}" class="btn btn-success text-light justify-content-center "  aria-expanded="false">
                                    <i class=" me-2 fa fa-plus"></i>Create
                                </a>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark"> 
                                    <tr>
                                        <th style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input select-all" type="checkbox" name="checkbox">
                                                    
                                                </label>
                                            </div> 
                                        </th>
                                        <th>Title</th>                                 
                                        <th>Cree le</th>                                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorie as $item)
                                        <tr>
                                            <td style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="checkbox" name="checkbox">
                                                        
                                                    </label>
                                                </div> 
                                            </td>
                                            <td class="text-truncate">
                                                <p class="mb-0 ms-1 d-inline-block">{{ $item->title }}</p>
                                            </td>                                  
                                            <td>
                                                <p class="mb-0 ms-1 d-inline-block">{{ $item->dateformatted() }}</p>
                                            </td>
                                            <td class="d-flex">
                                                @can('update', $item)
                                                    <a href="{{ route('categorie.edit',$item->id) }} " class="btn btn-warning text-light mx-3"><i class="me-2 fa fa-edit"></i>Modifier</a>
                                                @endcan
                                                @can('delete', $item)
                                                    <button title="delete" type="submit" onclick="document.getElementById('model-open-{{$item->id}}').style.display='block'" class="btn btn-danger text-light"><i class="me-2 fa fa-trash"></i>Supprimer</button>
                                                    <form action="{{ route('categorie.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="modal" id="model-open-{{$item->id}}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">La suppression d'un element est definitive</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('model-open-{{$item->id}}').style.display='none'" aria-label="proche">
                                                                            <span aria-hidden="true"></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Etes-vous sure de vouloir supprimer cet element?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger text-light">Oui</button>
                                                                        <button type="button" class="btn btn-success text-light" onclick="document.getElementById('model-open-{{$item->id}}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 flex-lg-column  order-lg-2  order-sm-1 order-1">
                <div class="sticky-lg-top">
                    <div class="row row-deck g-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                            <div class="card  bg-secondary text-light">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column">
                                    <div class="preview-pane text-center">
                                       
                                        <span class="project-name display-5 fw-bold  d-flex justify-content-center">Categories</span>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-12">
                            <div class="card  color-bg-200">
                                <div class="card-header py-3">
                                    <h6 class="mb-0 fw-bold ">Type d'utlisateur</h6>
                                </div>
                                <div class="card-body">
                                        <div class="team-filter pb-3">
                                            <div class="dropdown">
                                                <button class="btn btn-dark  w-100" type="button">
                                                    @if (Auth::user())
                                                        {{ Auth::user()->role }}
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tertiary-list pt-3">
                                            <ul class="pt-3 ps-0 list-unstyled">
                                                <li><a href="/exportPDF" class="btn btn-outline-primary w-100 mb-3"><i class="bi bi-file-earmark-arrow-down-fill fs-5 me-2"></i>Exporter en fichier pdf</a></li>
                                                <li><a href="/exportCategorie" class="btn btn-outline-primary w-100 mb-3"><i class="bi bi-file-earmark-arrow-up-fill fs-5 me-2"></i>Exporter en fichier excel</a></li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div> 
        </div>
    </div>
</div>