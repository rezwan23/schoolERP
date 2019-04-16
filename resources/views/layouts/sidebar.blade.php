<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('/uploads/'.auth()->user()->photo)}}" width="50px" height="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{auth()->user()->roleName()}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('student.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Students</span></a></li>
        <li><a class="app-menu__item" href="{{route('teacher.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Teachers</span></a></li>
        <li><a class="app-menu__item" href="{{route('class.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Classes</span></a></li>
        <li><a class="app-menu__item" href="{{route('librarian.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Librarian</span></a></li>
        <li><a class="app-menu__item" href="{{route('time.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Time Table</span></a></li>
        <li><a class="app-menu__item" href="{{route('fee.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">View Fee</span></a></li>
        <li><a class="app-menu__item" href="{{route('event.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Events</span></a></li>
        <li><a class="app-menu__item" href="{{route('book.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Books</span></a></li>
        <li><a class="app-menu__item" href="{{route('assignment.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Assignemnt</span></a></li>
        <li><a class="app-menu__item" href="{{route('attendance.create')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Attendance</span></a></li>
        <li><a class="app-menu__item" href="{{route('result.create')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Result</span></a></li>
        <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Charts</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
                <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
                <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
                <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
                <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
                <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
                <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
                <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
                <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
                <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
                <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
                <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
            </ul>
        </li>
    </ul>
</aside>