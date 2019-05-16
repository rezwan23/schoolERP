<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('/uploads/'.auth()->user()->photo)}}" width="50px" height="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{auth()->user()->roleName()}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        @can('student-crud')
        <li><a class="app-menu__item" href="{{route('student.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Students</span></a></li>
        @endcan
        @can('teacher-crud')
        <li><a class="app-menu__item" href="{{route('teacher.index')}}"><i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Teachers</span></a></li>
        @endcan
            @can('class-crud')
                <li><a class="app-menu__item" href="{{route('class.index')}}"><i class="app-menu__icon fa fa-envelope-open"></i><span class="app-menu__label">Classes</span></a></li>
        @endcan
            @can('librarian-crud')
                <li><a class="app-menu__item" href="{{route('librarian.index')}}"><i class="app-menu__icon fa fa-superpowers"></i><span class="app-menu__label">Librarian</span></a></li>
            @endcan
                @can('time-table-crud')
            <li><a class="app-menu__item" href="{{route('time.index')}}"><i class="app-menu__icon fa fa-telegram"></i><span class="app-menu__label">Time Table</span></a></li>
        @endcan
            @can('fee-crud')
                <li><a class="app-menu__item" href="{{route('fee.index')}}"><i class="app-menu__icon fa fa-anchor"></i><span class="app-menu__label">View Fee</span></a></li>
        @endcan
            @can('event-crud')
                <li><a class="app-menu__item" href="{{route('event.index')}}"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Events</span></a></li>
        @endcan
            @can('book-crud')
                <li><a class="app-menu__item" href="{{route('book.index')}}"><i class="app-menu__icon fa fa-birthday-cake"></i><span class="app-menu__label">Books</span></a></li>
            @endcan
                @can('assignment-crud')
            <li><a class="app-menu__item" href="{{route('assignment.index')}}"><i class="app-menu__icon fa fa-bookmark"></i><span class="app-menu__label">Assignemnt</span></a></li>
        @endcan
            @can('attendance-crud')
                <li><a class="app-menu__item" href="{{route('attendance.create')}}"><i class="app-menu__icon fa fa-eraser"></i><span class="app-menu__label">Attendance</span></a></li>
        @endcan
            @can('result-crud')
                <li><a class="app-menu__item" href="{{route('result.create')}}"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Result</span></a></li>
        @endcan
            @can('book-issue-crud')
                <li><a class="app-menu__item" href="{{route('book.issue')}}"><i class="app-menu__icon fa fa-envelope-square"></i><span class="app-menu__label">Issue Book</span></a></li>
        @endcan
            @can('book-issue-crud')
                <li><a class="app-menu__item" href="{{route('book.issued')}}"><i class="app-menu__icon fa fa-exclamation-circle"></i><span class="app-menu__label">Return Book</span></a></li>
        @endcan
            @can('set-permission')
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">User - Role</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('role.index')}}"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            </ul>
        </li>
                @endcan
        @can('send-sms')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-folder-open"></i><span class="app-menu__label">SMS</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('sms.new')}}"><i class="icon fa fa-circle-o"></i> New Sms</a></li>
                <li><a class="treeview-item" href="{{route('sms.group')}}"><i class="icon fa fa-circle-o"></i> Group Sms</a></li>
                <li><a class="treeview-item" href="{{route('sms.group.create')}}"><i class="icon fa fa-circle-o"></i> Create Sms Group</a></li>
                {{--<li><a class="treeview-item" href="{{route('sms.config')}}"><i class="icon fa fa-circle-o"></i> Config</a></li>--}}
            </ul>
        </li>
            @endcan
    </ul>
</aside>