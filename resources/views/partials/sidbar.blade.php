<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a class="active" href="{{route('home')}}"> Dashboard</a>
            </li>
            @can('Catogrey-list')
            <li>
                <a href="{{route('catogrey.index')}}"> {{trans('admin.catogres')}}
                    <span class="fa arrow"></span></a>
                <!-- /.nav-second-level -->
            </li>
            @endcan
                @can('donation-list')

                <li>
                <a href="{{route('donation.index')}}"> {{trans('admin.donations')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('Order-list')


            <li>
                <a href="{{route('order.index')}}"> {{trans('admin.order')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('Office-list')

            <li>
                <a href="{{route('office.index')}}"> {{trans('admin.offices')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('user-list')
            <li>
                <a href="{{route('user.index')}}">{{trans('admin.users')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('beneficiary-list')
            <li>
                <a href="{{route('beneficiary.index')}}"> {{trans('admin.beneficiary')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('Delavary-list')
            <li>
                <a href="{{route('delavery.index')}}">{{trans('admin.delavery')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('Resignation-list')
            <li>
                <a href="{{route('resignation.index')}}"> {{trans('admin.resignation')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('TypeDonation-list')
            <li>
                <a href="{{route('typeDonation.index')}}"> {{trans('admin.typeDonation')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('role-list')
            <li>
                <a href="{{route('roles.index')}}"> {{trans('admin.roles')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            @can('ArchiveDonation-list')
            <li>
                <a href="{{route('archiveDonation')}}"> {{trans('admin.archives')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan
            <li class="">
                <a href="#"><i class="fa fa-files-o fa-fw"></i>التقارير<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    <li>
                        <a href="{{route('reportfordon')}}">    تقارير التبرعات الداخله
                            <span class="fa arrow"></span></a>                    </li>
                    <li>
                        <a href="{{route('reportfordelavary')}}"> تقارير التبرعات الخارجه
                            <span class="fa arrow"></span></a>                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
