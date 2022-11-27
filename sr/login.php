<?php
session_start();
if (isset($_SESSION["sid"])) {
    header("location:sr_home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include "../components/head2.php"; ?>
</head>

<body>
    <div class="container log">
        <div class="form">
            <h4 class="lt">SR Login</h4>
            <p>Enter your number & password</p>

            <form class="login_form" action="../php/sr_login.php" method="post">
                <input type="number" name="number" id="number" placeholder="number" required>
                <input type="password" name="password" id="password" placeholder="password" required>
                <a href="">
                Forget Password?
            </a>
                <input type="submit" id="login" name="login" value="Login">
            </form>
        </div>
        <div class="svg">
            <svg width="298" height="243" viewBox="0 0 298 243" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M135.746 8.31701C135.925 8.73967 136.058 9.18147 136.143 9.6344C135.95 8.94349 135.798 8.47452 135.746 8.31701Z" fill="#3F3D56" />
                <path d="M141.865 30.2042C141.865 30.2042 141.865 30.6982 141.351 32.481L141.865 30.2042Z" fill="#3F3D56" />
                <path d="M204.841 104.776C191.276 112.115 173.53 118.451 168.216 120.287C172.268 119.192 184.064 117.717 202.34 129.552C225.304 144.419 249.857 134.507 249.857 134.507C249.857 134.507 244.401 145.364 232.805 146.07C221.21 146.778 190.972 126.957 180.742 132.62C170.509 138.283 165.736 131.202 161.642 145.364C157.551 159.523 150.05 198.221 158.689 219.933L167.326 241.641H118.219C118.219 241.641 135.953 192.557 126.175 162.354C120.702 145.439 113.017 133.189 110.151 126.964C108.713 123.846 108.485 122.242 110.348 122.321C111.407 122.367 113.142 122.958 115.718 124.125C115.718 124.125 103.895 112.09 100.032 112.09C96.1655 112.09 77.9754 110.203 72.0672 103.831C72.0672 103.831 63.6551 97.695 48.6484 112.798C33.6417 127.902 37.2804 127.902 23.8672 126.72C10.6644 125.557 0.320743 118.909 -1.52588e-05 118.702C0.382826 118.863 15.8034 125.26 25.2296 122.002C34.7799 118.698 42.9644 106.19 51.3766 101.944C59.7887 97.695 64.7898 92.0317 76.1577 98.1675L68.6665 79.8351L66.6143 74.8126L66.6109 74.8054C66.6109 74.8054 64.1069 40.3529 59.3334 37.9938C54.56 35.6311 57.5158 29.4988 48.6484 28.3175C48.6484 28.3175 59.5611 26.8998 61.6063 34.6896C63.6551 42.4758 77.7512 84.4817 77.7512 84.4817C77.7512 84.4817 86.3876 102.413 95.9379 98.1675C105.488 93.9182 92.2992 70.0872 92.2992 70.0872L75.9301 62.2974C75.9301 62.2974 88.2086 61.8249 95.7102 69.1421C103.212 76.4557 103.667 100.054 103.667 100.054C103.667 100.054 122.537 102.886 127.086 113.507C127.086 113.507 130.042 104.067 124.358 98.4038C122.937 96.9862 121.443 94.5232 120.005 91.6271C114.553 80.5113 112.583 67.9055 114.369 55.5709C115.214 49.5352 115.735 43.6321 114.807 42.2395C112.762 39.1716 104.122 20.295 103.44 15.3369C102.76 10.3824 104.122 0.000823975 104.122 0.000823975C104.122 0.000823975 104.35 12.7415 107.078 16.7545C109.806 20.7675 117.536 40.5892 117.536 40.5892C117.536 40.5892 117.536 65.6016 123.903 77.8733C130.269 90.1451 142.544 103.831 141.865 112.798V117.989C141.865 117.989 155.506 104.54 154.595 100.054C153.685 95.5721 152.55 84.9507 143.91 78.5822C135.27 72.21 129.586 62.0611 135.726 47.4303C139.178 39.2002 140.689 34.7791 141.351 32.4844L137.771 48.3754C137.771 48.3754 135.498 64.6565 141.865 70.3198C141.882 70.3342 141.896 70.3485 141.913 70.3628C148.27 76.0333 156.641 86.3683 156.641 86.3683L156.616 85.9137L154.823 52.3884L155.216 53.2833L158.051 59.7342L160.735 65.8379C160.735 65.8379 173.465 48.8479 188.472 43.1846C203.475 37.5213 212.797 17.6996 212.797 17.6996L225.531 7.31446L215.07 20.295C215.07 20.295 211.887 35.6311 193.928 46.4888C175.965 57.3429 164.373 73.3878 163.69 83.3004C163.007 93.213 162.325 101.944 162.325 101.944C162.325 101.944 195.973 100.763 203.475 85.4232C210.98 70.0872 217.119 69.3783 217.119 69.3783L212.797 82.5916L208.024 93.9182C208.024 93.9182 227.577 94.3908 237.806 106.426C248.04 118.462 273.5 122.002 273.5 122.002L259.18 126.012C259.18 126.012 245.536 121.293 232.578 112.562C219.62 103.831 220.982 96.0447 204.841 104.776V104.776Z" fill="#3F3D56" />
                <path opacity="0.1" d="M212.09 72.5789C210.652 79.1873 208.959 85.5702 206.579 90.4352C199.077 105.775 165.429 106.956 165.429 106.956C165.429 106.956 165.587 104.93 165.829 101.733C174.372 101.003 197.725 97.8849 203.82 85.4234C204.378 84.285 204.896 83.0607 205.386 81.772L212.09 72.5789Z" fill="black" />
                <path opacity="0.1" d="M159.745 91.3803C159.745 91.3803 151.333 80.9952 144.969 75.3319C143.572 74.0932 142.593 72.3391 141.913 70.363C141.858 70.2055 141.806 70.0444 141.755 69.8833C141.903 70.0337 142.051 70.1804 142.21 70.3201C147.78 75.2782 154.923 83.8555 156.616 85.9139C156.854 86.2074 156.986 86.3685 156.986 86.3685L155.216 53.2835L158.051 59.7344L159.745 91.3803Z" fill="black" />
                <path opacity="0.1" d="M164.614 61.5843C164.565 67.3943 163.838 70.8498 163.838 70.8498C163.838 70.8498 176.565 53.8666 191.566 48.1995C192.452 47.6174 193.352 47.0442 194.273 46.4878C212.234 35.6328 215.417 20.2942 215.417 20.2942L225.875 7.31534L213.143 17.6984C213.143 17.6984 203.821 37.5206 188.816 43.1841C178.588 47.0446 169.417 56.1665 164.614 61.5843V61.5843Z" fill="black" />
                <path opacity="0.1" d="M144.968 117.81V123.001C144.968 123.001 158.609 109.55 157.699 105.067C157.004 101.638 156.171 94.6219 151.956 88.6603C153.856 93.1656 154.434 97.5602 154.94 100.055C155.592 103.27 148.763 111.096 144.846 115.267C144.983 116.106 145.024 116.96 144.968 117.81V117.81Z" fill="black" />
                <path opacity="0.1" d="M126.669 82.1826C126.777 82.4217 126.889 82.6571 127.007 82.8847C130.493 89.605 135.749 96.7487 139.682 103.311C136.504 96.8123 130.972 89.3814 126.669 82.1826V82.1826Z" fill="black" />
                <path opacity="0.1" d="M202.685 129.552C195.206 124.71 188.813 122.097 183.591 120.773C178.113 122.913 173.605 124.509 171.336 125.292C175.405 124.199 187.192 122.747 205.444 134.564C219.764 143.835 234.703 143.47 243.92 141.882C246.469 139.886 248.605 137.378 250.202 134.508C250.202 134.508 225.647 144.419 202.685 129.552V129.552Z" fill="black" />
                <path opacity="0.1" d="M137.753 72.1362C135.92 67.4736 135.618 61.9255 137.724 55.4242C137.698 53.0681 137.829 50.7129 138.116 48.3756L141.696 32.4807C141.036 34.7729 139.526 39.1949 136.07 47.4317C131.695 57.8592 133.328 66.0074 137.753 72.1362Z" fill="black" />
                <path opacity="0.1" d="M238.152 106.426C231.057 98.0801 219.48 95.2957 213.049 94.3725L211.128 98.9313C211.128 98.9313 230.68 99.4032 240.911 111.438C246.585 118.112 256.941 122.172 265.043 124.467L273.847 122.001C273.847 122.001 248.383 118.461 238.152 106.426V106.426Z" fill="black" />
                <path opacity="0.1" d="M99.0421 103.179C108.591 98.9313 95.4044 75.0974 95.4044 75.0974L95.0437 74.9258C98.3312 82.1251 103.099 95.1351 96.2829 98.1671C89.9048 101.004 83.9333 93.9457 80.6702 88.9447C80.7887 89.2984 80.8538 89.4922 80.8538 89.4922C80.8538 89.4922 89.4932 107.427 99.0421 103.179Z" fill="black" />
                <path opacity="0.1" d="M130.19 118.518C130.19 118.518 133.067 109.312 127.662 103.628C128.987 108.525 127.43 113.506 127.43 113.506C123.913 105.291 111.826 101.737 106.532 100.549C106.737 103.284 106.772 105.067 106.772 105.067C106.772 105.067 125.643 107.898 130.19 118.518V118.518Z" fill="black" />
                <path opacity="0.1" d="M141.696 32.4806C142.208 30.7013 142.208 30.2052 142.208 30.2052L141.696 32.4806Z" fill="black" />
                <path opacity="0.1" d="M28.197 127.058C28.2428 127.043 28.2894 127.029 28.3349 127.013C37.8838 123.709 46.0686 111.202 54.4807 106.955C62.8928 102.707 67.8946 97.0435 79.2623 103.179C79.2623 103.179 77.2735 94.7296 73.4196 89.1785C74.6961 92.0765 75.7278 95.084 76.503 98.1671C65.1353 92.0317 60.1336 97.6952 51.7215 101.943C43.3094 106.19 35.1246 118.697 25.5757 122.001C16.0268 125.305 0.339401 118.697 0.339401 118.697C0.339401 118.697 10.7977 125.541 24.2116 126.721C25.7461 126.855 27.0554 126.975 28.197 127.058V127.058Z" fill="black" />
                <path opacity="0.1" d="M69.715 79.8174C69.715 79.8174 69.3425 79.8246 68.6665 79.8353L66.6143 74.8128C66.8385 74.8092 66.9558 74.8056 66.9558 74.8056C66.9558 74.8056 65.3761 53.0759 62.3341 42.9485C62.372 42.9664 62.4031 42.9879 62.4376 43.0058C67.211 45.3649 69.715 79.8174 69.715 79.8174V79.8174Z" fill="black" />
                <path opacity="0.1" d="M122.984 241.642C127.149 228.387 137.168 191.735 129.28 167.365C125.874 156.841 122.717 150.13 120.048 145.848C122.044 149.901 124.226 155.262 126.521 162.353C136.297 192.559 118.564 241.642 118.564 241.642H122.984Z" fill="black" />
                <path opacity="0.1" d="M118.822 129.137C116.079 127.885 113.143 127.149 110.151 126.964C108.713 123.846 108.485 122.242 110.348 122.321C110.865 122.418 111.386 122.532 111.903 122.665C115.559 125.815 118.822 129.137 118.822 129.137V129.137Z" fill="black" />
                <path opacity="0.1" d="M57.2727 35.7017C57.532 36.155 57.8463 36.5719 58.2077 36.9424C57.9422 36.4934 57.6286 36.0772 57.2727 35.7017V35.7017Z" fill="black" />
                <path opacity="0.1" d="M98.8147 74.1535C99.1661 74.4985 99.4954 74.8669 99.8004 75.2565C98.8045 72.7716 97.5746 70.6228 96.0555 69.1417C88.5529 61.8264 76.2757 62.2984 76.2757 62.2984L91.6725 69.6229C94.3108 70.6445 96.7355 72.1826 98.8147 74.1535Z" fill="black" />
                <path opacity="0.1" d="M115.153 42.2402C116.081 43.6312 115.56 49.5344 114.713 55.5719C112.927 67.9061 114.898 80.5112 120.35 91.6261C121.075 93.1135 121.884 94.5548 122.773 95.9424C117.577 84.9918 115.727 72.6552 117.472 60.5837C118.319 54.5463 118.84 48.643 117.912 47.252C115.866 44.1842 107.227 25.3059 106.545 20.3504C106.34 18.4279 106.293 16.4909 106.402 14.56C104.636 9.35902 104.468 0 104.468 0C104.468 0 103.104 10.3831 103.786 15.3386C104.468 20.2941 113.107 39.1725 115.153 42.2402V42.2402Z" fill="black" />
                <path opacity="0.1" d="M136.483 9.61702C136.391 9.15061 136.253 8.6955 136.07 8.25928C136.07 8.25928 136.245 8.76858 136.483 9.61702Z" fill="black" />
                <path opacity="0.1" d="M56.1801 33.3831C58.1838 33.6377 60.4887 34.2758 62.2468 35.7557C62.1321 35.3531 62.0321 34.9922 61.9524 34.6889C59.9062 26.9016 48.9932 28.3175 48.9932 28.3175C53.9249 28.9737 55.1988 31.1631 56.1801 33.3831Z" fill="black" />
                <path d="M270.58 229.518C267.19 234.915 268.119 241.779 268.119 241.779C268.119 241.779 274.545 239.893 277.936 234.496C281.327 229.099 280.398 222.235 280.398 222.235C280.398 222.235 273.971 224.121 270.58 229.518Z" fill="#3F3D56" />
                <path d="M273.127 230.472C272.859 236.909 268.256 241.931 268.256 241.931C268.256 241.931 264.086 236.516 264.354 230.078C264.622 223.641 269.226 218.62 269.226 218.62C269.226 218.62 273.395 224.035 273.127 230.472Z" fill="#737289" fill-opacity="0.35" />
                <path d="M213.407 189.736C213.407 189.736 217.308 185.488 218.905 186.342C220.502 187.197 214.314 190.996 214.314 190.996L213.407 189.736Z" fill="#FFB9B9" />
                <path opacity="0.1" d="M213.407 189.736C213.407 189.736 217.308 185.488 218.905 186.342C220.502 187.197 214.314 190.996 214.314 190.996L213.407 189.736Z" fill="black" />
                <path d="M224.915 186.959L215.072 192.571C215.015 192.61 214.95 192.636 214.882 192.647C214.815 192.657 214.746 192.652 214.68 192.632C214.614 192.612 214.553 192.577 214.502 192.53C214.451 192.483 214.41 192.425 214.383 192.36L211.971 187.128C211.926 186.979 211.933 186.818 211.992 186.674C212.051 186.53 212.158 186.413 212.294 186.344L220.466 181.972C220.567 181.909 220.686 181.887 220.802 181.91C220.917 181.933 221.02 181.999 221.092 182.096L225.174 186.088C225.214 186.162 225.239 186.244 225.248 186.329C225.257 186.414 225.249 186.499 225.224 186.581C225.2 186.662 225.16 186.738 225.107 186.803C225.054 186.868 224.989 186.921 224.915 186.959V186.959Z" fill="#2F2E41" />
                <path d="M219.912 189.278C219.944 189.238 219.944 189.183 219.911 189.154C219.878 189.126 219.826 189.135 219.794 189.175C219.762 189.215 219.762 189.27 219.795 189.299C219.828 189.327 219.88 189.318 219.912 189.278Z" fill="#F2F2F2" />
                <path d="M17.0092 241.284H295V242H17.0092V241.284Z" fill="#3F3D56" />
                <path d="M198.041 169.45C198.189 169.327 198.019 168.851 197.662 168.389C197.304 167.927 196.893 167.652 196.745 167.776C196.596 167.9 196.766 168.375 197.124 168.837C197.482 169.3 197.892 169.574 198.041 169.45Z" fill="#737289" fill-opacity="0.35" />
                <path d="M168.489 229.518C165.099 234.915 166.028 241.779 166.028 241.779C166.028 241.779 172.454 239.893 175.845 234.496C179.236 229.099 178.307 222.235 178.307 222.235C178.307 222.235 171.88 224.121 168.489 229.518Z" fill="#3F3D56" />
                <path d="M171.036 230.472C170.768 236.909 166.165 241.931 166.165 241.931C166.165 241.931 161.995 236.516 162.263 230.078C162.531 223.641 167.135 218.62 167.135 218.62C167.135 218.62 171.304 224.035 171.036 230.472Z" fill="#737289" fill-opacity="0.35" />
                <path d="M112.688 231.559C114.309 237.779 119.862 241.631 119.862 241.631C119.862 241.631 122.786 235.399 121.165 229.179C119.544 222.96 113.991 219.108 113.991 219.108C113.991 219.108 111.067 225.34 112.688 231.559Z" fill="#3F3D56" />
                <path d="M115.07 230.223C119.518 234.717 120.062 241.626 120.062 241.626C120.062 241.626 113.393 241.248 108.945 236.754C104.497 232.259 103.954 225.351 103.954 225.351C103.954 225.351 110.622 225.728 115.07 230.223V230.223Z" fill="#737289" fill-opacity="0.35" />
                <path d="M100.327 61.5901C99.9405 68.0208 95.2449 72.95 95.2449 72.95C95.2449 72.95 91.1763 67.453 91.563 61.0224C91.9497 54.5918 96.6453 49.6626 96.6453 49.6626C96.6453 49.6626 100.714 55.1595 100.327 61.5901V61.5901Z" fill="#737289" fill-opacity="0.35" />
                <path d="M51.38 20.9368C56.6312 24.373 58.5465 31.0136 58.5465 31.0136C58.5465 31.0136 51.948 32.083 46.6968 28.6468C41.4457 25.2105 39.5303 18.5699 39.5303 18.5699C39.5303 18.5699 46.1289 17.5006 51.38 20.9368Z" fill="#737289" fill-opacity="0.35" />
                <path d="M39.6534 99.3355C44.9045 102.772 46.8198 109.412 46.8198 109.412C46.8198 109.412 40.2213 110.482 34.9702 107.045C29.719 103.609 27.8037 96.9687 27.8037 96.9687C27.8037 96.9687 34.4022 95.8993 39.6534 99.3355Z" fill="#737289" fill-opacity="0.35" />
                <path d="M146.407 32.398C144.824 38.628 139.295 42.5158 139.295 42.5158C139.295 42.5158 136.333 36.3029 137.917 30.0729C139.5 23.843 145.029 19.9551 145.029 19.9551C145.029 19.9551 147.991 26.1681 146.407 32.398Z" fill="#737289" fill-opacity="0.35" />
                <path d="M196.361 37.2557C194.5 43.4024 188.803 47.0189 188.803 47.0189C188.803 47.0189 186.123 40.6696 187.984 34.5229C189.845 28.3762 195.543 24.7597 195.543 24.7597C195.543 24.7597 198.223 31.109 196.361 37.2557V37.2557Z" fill="#737289" fill-opacity="0.35" />
                <path d="M250.354 105.666C246.982 111.076 240.562 112.986 240.562 112.986C240.562 112.986 239.609 106.125 242.981 100.715C246.352 95.3054 252.772 93.3949 252.772 93.3949C252.772 93.3949 253.725 100.256 250.354 105.666V105.666Z" fill="#737289" fill-opacity="0.35" />
                <path d="M55.992 229.177C55.8599 226.188 53.5949 223.947 51.0678 223.947H50.6774C48.4766 223.947 46.3337 223.145 44.5216 221.666C42.772 220.237 40.52 219.612 38.1379 220.249C37.3875 220.45 31.9967 222.281 32 229.474C32.0017 232.975 33.6117 236.027 35.9996 237.665V241.316C35.9996 241.752 36.2979 242.106 36.6662 242.106H37.3329C37.7012 242.106 37.9996 241.752 37.9996 241.316V238.639C38.6396 238.834 39.3079 238.948 39.9995 238.948C40.2262 238.948 40.4445 238.912 40.6662 238.889V241.316C40.6662 241.752 40.9645 242.106 41.3329 242.106H41.9995C42.3679 242.106 42.6662 241.752 42.6662 241.316V238.384C43.2595 238.134 43.8279 237.822 44.347 237.421C46.2529 235.95 48.4108 235 50.6857 235C51.7474 235 51.3528 234.985 51.6462 234.962L54.7466 241.694C54.8657 241.952 55.0924 242.106 55.332 242.106C55.3866 242.106 55.442 242.098 55.4966 242.081C55.792 241.992 55.9986 241.677 55.9986 241.316C55.9986 241.316 56.0045 229.462 55.992 229.177ZM51.332 230.658C50.7799 230.658 50.332 230.127 50.332 229.474C50.332 228.819 50.7799 228.289 51.332 228.289C51.8841 228.289 52.332 228.819 52.332 229.474C52.332 230.127 51.8841 230.658 51.332 230.658ZM54.6653 238.22L53.0045 234.614C53.6345 234.326 54.2016 233.893 54.6653 233.332V238.22Z" fill="#3F3D56" />
                <path d="M274 50.9156L268.481 48.9327C268.01 46.9147 266.834 45.7565 266.834 45.7565C263.867 42.8787 259.071 42.8787 256.104 45.7565L253.426 48.3536L241.429 36C239.619 43.0191 241.429 50.0382 245.862 55.6886L236 64.9538C236 64.9538 252.087 68.4633 261.46 61.3565C266.454 57.5662 267.576 55.3551 268.282 53.0213L274 50.9156ZM264.428 51.3016C263.722 51.986 262.564 51.986 261.858 51.3016C261.152 50.6173 261.152 49.5118 261.858 48.8274C262.564 48.143 263.722 48.143 264.428 48.8274C265.133 49.5118 265.133 50.6173 264.428 51.3016Z" fill="#3F3D56" />
                <path d="M248.867 223.236C248.867 223.236 249.416 220.101 247.119 221.517C247.119 221.517 246.919 218.332 244.972 220.557C244.972 220.557 243.923 218.584 242.774 220.405C241.226 222.832 240.177 226.675 241.176 233.046L243.074 231.782C244.422 227.787 249.267 227.332 249.916 225.158C250.365 223.641 248.867 223.236 248.867 223.236M230.039 219.849L225.094 221.669C226.193 215.601 233.385 216.006 233.385 216.006C233.385 216.006 229.989 217.624 230.039 219.849" fill="#3F3D56" />
                <path d="M230.838 220.961L225.594 221.669C227.991 216.006 234.933 217.978 234.933 217.978C234.933 217.978 231.287 218.787 230.838 220.961" fill="#3F3D56" />
                <path d="M220 225.613L222.697 224.905V226.726C222.697 226.675 221.049 226.422 220 225.613M222.697 224.855L220 223.489C221.798 222.073 223.846 222.529 223.846 222.529L222.697 224.855Z" fill="#8F8F8F" />
                <path d="M235.882 237.749H234.833V241.744C234.683 241.794 233.784 241.693 233.385 241.693C232.486 241.693 231.737 242.35 231.737 242.35H235.882V237.749ZM231.487 237.749H230.438V241.744C230.288 241.794 229.389 241.693 228.99 241.693C228.091 241.693 227.342 242.35 227.342 242.35H231.487V237.749Z" fill="black" />
                <path d="M245.97 229.254C247.918 229.254 243.923 238.103 234.334 238.103C227.841 238.103 222.397 235.473 222.397 227.231C222.397 222.124 225.594 217.978 232.136 219.646C238.779 221.416 235.382 229.254 245.97 229.254Z" fill="#3F3D56" />
                <path d="M237.78 237.092C229.989 237.092 230.788 231.024 223.846 231.428C226.393 239.418 237.78 237.092 237.78 237.092Z" fill="white" />
                <path d="M238.529 225.714C233.535 220.759 228.44 228.849 234.583 232.086C240.626 235.221 244.772 229.658 244.772 229.658C244.772 229.658 241.725 228.9 238.529 225.714Z" fill="#232425" />
                <path d="M226.543 224.804C227.232 224.804 227.791 224.238 227.791 223.54C227.791 222.842 227.232 222.276 226.543 222.276C225.853 222.276 225.294 222.842 225.294 223.54C225.294 224.238 225.853 224.804 226.543 224.804Z" fill="#EBF3FA" />
                <path d="M31.8031 108.12C31.606 107.768 31.3067 107.552 31.0691 107.427C31.1055 106.982 31.0961 106.258 30.7221 105.817C30.4139 105.452 29.9355 105.348 29.3649 105.546C29.2263 104.978 28.905 104.235 28.1639 104.235C27.8435 104.235 27.5109 104.387 27.1581 104.696C26.9129 104.427 26.5457 104.145 26.0813 104.145C25.602 104.145 25.1682 104.438 24.7925 105.016C23.7782 106.575 23.2031 108.464 23.0316 110.698C22.6019 110.367 22.1599 109.991 21.7131 109.558C21.4107 109.265 21.0988 109.018 20.7807 108.809C20.6718 108.624 20.5638 108.437 20.4571 108.248C19.581 106.699 18.6769 105.101 16.3684 104.348C17.286 103.814 18.3228 103.572 18.3358 103.569L20.0319 103.183L18.3556 102.718C18.3138 102.707 17.3607 102.447 16.0656 102.418C16.5943 102.056 17.0389 101.843 17.0461 101.84L18.6027 101.103L16.8796 101.005C16.8796 101.005 16.7847 101 16.6146 101C15.2961 101 10.9171 101.294 9.41993 105.044C8.72557 105.553 8.15767 106.228 7.72027 107.02C7.05246 107.02 5.98956 107.165 5 107.926L6.99036 108.924C6.96291 109.036 6.92961 109.144 6.90621 109.258L5 109.761C5.53595 110.181 6.23886 110.43 6.74511 110.567C6.73206 110.781 6.71541 110.991 6.71541 111.21C6.71541 116.529 9.30202 119.777 14.2336 120.759V123.768C14.086 123.794 13.2823 123.724 12.9542 123.724C12.1384 123.724 11.4764 124.275 11.4764 124.275H15.166V120.92C15.963 121.026 16.8126 121.08 17.7166 121.08C17.8674 121.08 18.0141 121.074 18.1621 121.07V123.768C18.015 123.793 17.2104 123.724 16.8828 123.724C16.0669 123.724 15.4054 124.275 15.4054 124.275H19.0945V121.011C25.5323 120.366 28.8956 115.318 28.8956 113.494C28.8956 113.225 28.8308 113.001 28.7052 112.83C28.5761 112.654 28.3875 112.55 28.1688 112.517C28.5932 112.23 29.031 111.973 29.454 111.73C30.6038 111.071 31.5974 110.501 31.8967 109.53C32.0614 109 32.0285 108.526 31.8031 108.12M26.1645 113.481C25.3887 114.276 23.6022 115.782 21.1947 115.782C20.184 115.782 19.1517 115.516 18.1275 114.993C16.3824 114.103 15.5652 112.651 15.9409 111.109C16.2514 109.838 17.3121 108.95 18.5203 108.95C19.3722 108.95 20.2618 109.377 21.0943 110.186C23.1693 112.201 25.1588 113.114 26.1645 113.481ZM27.4259 115.081C26.0358 117.443 22.6599 120.202 17.7166 120.202C11.0039 120.202 7.60056 117.176 7.60056 111.209C7.60056 108.778 8.49067 106.763 10.0418 105.682L10.1539 105.604L10.202 105.476C11.1151 103.034 13.4866 102.24 15.1602 101.989C14.9226 102.174 14.6818 102.382 14.46 102.613L13.6058 103.498L14.833 103.353C15.3541 103.29 15.9414 103.281 16.4481 103.314C15.9706 103.541 15.4698 103.838 15.058 104.216L14.4352 104.787L15.2641 104.967C15.3955 104.995 15.5265 105.024 15.6606 105.058C17.7243 105.579 18.6099 106.815 19.405 108.187C19.1107 108.112 18.8151 108.072 18.5208 108.072C16.9026 108.072 15.4882 109.236 15.0805 110.903C14.7111 112.417 15.211 114.492 17.7225 115.775C18.874 116.363 20.0418 116.661 21.1951 116.661C24.8991 116.661 27.2036 113.657 27.299 113.529L27.4187 113.37C27.6081 113.378 27.8016 113.382 28.0028 113.383C28.041 113.554 27.9776 114.143 27.4259 115.081M31.0511 109.273C30.8535 109.914 29.9994 110.403 29.0112 110.97C28.3016 111.378 27.5141 111.845 26.8017 112.454C26.3832 112.422 26.0061 112.37 25.6475 112.307C25.1475 112.074 24.5423 111.749 23.8781 111.307C23.982 108.981 24.5252 107.05 25.5368 105.492C25.7307 105.195 25.9287 105.024 26.0822 105.024C26.3265 105.024 26.6213 105.408 26.7176 105.582L27.0213 106.141L27.4416 105.662C27.8997 105.14 28.1243 105.113 28.1648 105.113C28.3268 105.113 28.5414 105.684 28.5824 106.224L28.6346 106.929L29.2479 106.57C29.6124 106.357 29.8158 106.325 29.9045 106.325C29.99 106.325 30.0192 106.352 30.0444 106.381C30.2289 106.598 30.2186 107.253 30.1524 107.626L30.0885 108.017L30.4706 108.125C30.4746 108.126 30.8616 108.24 31.0313 108.551C31.1339 108.74 31.1411 108.983 31.0511 109.273" fill="#3F3D56" />
                <path d="M10.648 109.022C11.2693 109.022 11.773 108.521 11.773 107.903C11.773 107.285 11.2693 106.784 10.648 106.784C10.0267 106.784 9.52298 107.285 9.52298 107.903C9.52298 108.521 10.0267 109.022 10.648 109.022Z" fill="#3F3D56" />
                <path d="M265 25.5027L262.386 24.5053C262.163 23.4902 261.606 22.9077 261.606 22.9077C260.2 21.4601 257.929 21.4601 256.523 22.9077L255.254 24.214L249.571 18C248.714 21.5307 249.571 25.0614 251.671 27.9036L247 32.5641C247 32.5641 254.62 34.3295 259.06 30.7546C261.426 28.8481 261.957 27.7359 262.291 26.5619L265 25.5027ZM260.466 25.6969C260.131 26.0412 259.583 26.0412 259.249 25.6969C258.914 25.3527 258.914 24.7966 259.249 24.4524C259.583 24.1081 260.131 24.1081 260.466 24.4524C260.8 24.7966 260.8 25.3527 260.466 25.6969Z" fill="#3F3D56" />
                <path d="M297.687 32.9924L294.102 31.664C293.796 30.3121 293.032 29.5362 293.032 29.5362C291.104 27.6083 287.989 27.6083 286.061 29.5362L284.321 31.2761L276.527 23C275.351 27.7023 276.527 32.4046 279.407 36.19L273 42.397C273 42.397 283.451 44.7482 289.54 39.9871C292.785 37.4478 293.514 35.9666 293.972 34.4031L297.687 32.9924ZM291.468 33.251C291.01 33.7095 290.257 33.7095 289.799 33.251C289.341 32.7926 289.341 32.0519 289.799 31.5935C290.257 31.135 291.01 31.135 291.468 31.5935C291.927 32.0519 291.927 32.7926 291.468 33.251Z" fill="#3F3D56" />
            </svg>

        </div>
    </div>

</body>

</html>