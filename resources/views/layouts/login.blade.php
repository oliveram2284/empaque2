@include('components.head')
<body class="cui-config-borderless cui-menu-colorful cui-menu-left-shadow">    
    <div style="background-image: url(/cleanui/components/pages/common/img/login/1.jpeg)" >
        <div class="cui-layout cui-layout-has-sider">
            <div class="cui-layout">
                
                <div class="cui-layout-content">
                    
                    <div class="cui-utils-content">
                        @yield('content')
                    </div>
                </div>
            
                <div class="cui-layout-footer">
                    @include('components.footer')
                </div>
            </div>
        </div>
    </div>
</body>
</html>