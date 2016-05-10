<!DOCTYPE html>
<html>
<head>
    <title>Render Test - PHP</title>
    <script src="/react-15.0.2/build/react.js"></script>
    <script src="/react-15.0.2/build/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
</head>
<body>
    <h1>選項</h1>
    <div id="example">
        <div data-reactroot="">
            <select>
                @foreach($mobileCategories as $mainCategory)
                <option>{{ $mainCategory->name }}</option>
                @endforeach
            </select>
            <select>
                <option></option>
            </select>
            <select>
                <option></option>
            </select>
        </div>
    </div>
</body>
</html>