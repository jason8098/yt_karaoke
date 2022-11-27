# 유튜브 노래방
유튜브 API 기반 노래방 시스템 입니다.<br>
유튜브 API, PHP 와 MYSQL 데이터베이스를 이용해서 간단한 노래방 시스템을 만들어 봤습니다.<br>
핸드폰으로 리모컨 역할(검색, 예약, 취소)을 하며, 곡 검색을 하면 유튜브 API 를 이용해 태진 노래방 채널에서 검색목록울 가져옵니다.<br>
예약을 하면 곡 제목과 영상 ID 가 DB 에 등록됩니다.<br>
컴퓨터의 player.php 에서 영상이 재생되며, DB 목록을 상시로 업데이트 해주어 현제곡 / 예약곡 등 정보를 보여줍니다.<br>

# 스크린샷 / 사진
![image](https://user-images.githubusercontent.com/71935033/204155916-f5f10927-1725-4a30-8a2b-da2aa0919541.png)
![image](https://user-images.githubusercontent.com/71935033/204155927-01495356-3898-456f-a107-d3bfe6037565.png)
![image](https://user-images.githubusercontent.com/71935033/204156096-b798b006-2009-4e09-9547-8858c55d60f4.png)


![WhatsApp Image 2022-11-28 at 1 06 35 AM](https://user-images.githubusercontent.com/71935033/204156017-c1738b29-dea6-4014-9710-bdc8fde6c320.jpeg)
![WhatsApp Image 2022-11-28 at 1 06 35 AM (1)](https://user-images.githubusercontent.com/71935033/204156019-52a8604d-e6b5-48fd-867a-f9baf69b05aa.jpeg)
![WhatsApp Image 2022-11-28 at 1 08 21 AM](https://user-images.githubusercontent.com/71935033/204156024-d53dce6f-5a4c-4c8a-8e29-179017469023.jpeg)
![WhatsApp Image 2022-11-28 at 1 06 35 AM (2)](https://user-images.githubusercontent.com/71935033/204156021-5ecab198-90b2-4bbf-b4fd-09376d52e0b5.jpeg)
![WhatsApp Image 2022-11-28 at 1 06 35 AM (3)](https://user-images.githubusercontent.com/71935033/204156023-5af723de-1983-48b4-affa-2d9d2802b83f.jpeg)



# 설치방법 1 - 로컬 설치 (윈도우 10 기준)
먼저 XAMPP 가 설치 되어 있어야 합니다. 없으시면 아래 링크에서 다운받아 주세요.
https://www.apachefriends.org/download.html

그리고 C:\xampp\htdocs 폴더에 받은 파일을 다 넣어주세요.
그 후 Xampp Control Panel 을 실행 후 Apache 랑 Mysql 을 (start)켜줍니다.
Mysql 의 admin 버튼을 눌러 phpmyadmin 에 접속후 nrb 라는 이름의 데이터베이스를 만들고, 파일에 포합된 sql 파일을 가져오기 하시면 됩니다.

![-1](https://user-images.githubusercontent.com/71935033/193309305-1dfd0e73-09ce-4fc4-8b91-cd843546acf5.JPG)
![0](https://user-images.githubusercontent.com/71935033/193286948-22fe9f20-aeff-4839-8ede-7cf948325611.JPG)
![1](https://user-images.githubusercontent.com/71935033/193286959-f09fe17a-d163-4622-b92b-29ce75bfcba2.JPG)
![2](https://user-images.githubusercontent.com/71935033/193286974-52f460c1-fb7f-4a9a-976a-e18e5b9e1366.JPG)
![3](https://user-images.githubusercontent.com/71935033/193286986-6a279e59-9518-4f6a-9f02-fb7e27c44a3b.JPG)

# 설치방법 2 - 다른 웹서버에 설치
1번과 마찬가지로 DB 만들고, sql 파일 가져오신 다음에 자신의 웹서버 루트폴더나 다른 폴더 하나 만들어서 그안에다 파일 집어넣으시면 됩니다.

![1](https://user-images.githubusercontent.com/71935033/193286959-f09fe17a-d163-4622-b92b-29ce75bfcba2.JPG)
![2](https://user-images.githubusercontent.com/71935033/193286974-52f460c1-fb7f-4a9a-976a-e18e5b9e1366.JPG)
![3](https://user-images.githubusercontent.com/71935033/193286986-6a279e59-9518-4f6a-9f02-fb7e27c44a3b.JPG)

# 사용방법

## 1. API 키 얻기
https://console.cloud.google.com/ 으로 이동<br>
프로젝트 선택 > 새 프로젝트<br>
![4](https://user-images.githubusercontent.com/71935033/193328369-1c2504c1-1660-426d-b5dd-5396b3d236b5.JPG)
<br>
이름 아무거나 입력, 만들기<br>
![5](https://user-images.githubusercontent.com/71935033/193328375-b4d87daa-a8ec-47f6-9956-2caccb90489c.JPG)
<br>
프로젝트 선택<br>
![6](https://user-images.githubusercontent.com/71935033/193328378-076f5ac7-c8ea-4f7d-b596-2597b15fb846.JPG)
<br>
API 및 서비스 클릭<br>
![7](https://user-images.githubusercontent.com/71935033/193328381-57e5e9f4-f111-425e-ba82-3e85a0a0ab4b.JPG)
<br>
체크한거 클릭<br>
![8](https://user-images.githubusercontent.com/71935033/193328383-638d5936-55ee-461b-b90c-4a68182b7133.JPG)
<br>
youtube 검색<br>
![9](https://user-images.githubusercontent.com/71935033/193328389-30d12d4b-1616-42f6-9292-2831885c4fe2.JPG)
<br>
첫번째꺼 클릭<br>
![10](https://user-images.githubusercontent.com/71935033/193328390-20065562-8af1-4173-80b9-a649d3f35d59.JPG)
<br>
사용 클릭<br>
![11](https://user-images.githubusercontent.com/71935033/193328394-ff4bbcda-a76e-47f5-9348-e4b171b99734.JPG)
<br>
사용자 인증 정보 > 사용자 인증 정보 만들기<br>
![12](https://user-images.githubusercontent.com/71935033/193328397-c7ae9daa-1f1c-4c3b-93cf-ad415c88dd91.JPG)
<br>
API 키<br>
![13](https://user-images.githubusercontent.com/71935033/193328399-2036f216-abd6-4510-b7a7-fe14293a94bd.JPG)
<br>
복사해서 메모장에다 붙여넣기 해주세요<br>
![14](https://user-images.githubusercontent.com/71935033/193328403-51d1716b-cc36-492b-b993-d34ec718a55e.JPG)
<br>

## 2. API 키 붙여넣기
메모장으로 index.html을 열어 줍니다.<br>
아까 메모장에 써둔 키를 아래 따움표 사이에 붙여넣습니다.<br>

    // 유튜브 api 키를 아래 따움표 사이에 써주시면 됩니다.
    apiKey="";

<br>
끝났으면 저장 해줍시다.

## 3. 실행
XAMPP의 경우, 그 컴퓨터 에서 파이어폭스 브라우저에 http://localhost/player.php 로 이동합니다. <br>
그 후 F11 을 눌러 전체 화면을 해줍니다.

리모컨 역할을 위해 핸드폰에서 컴퓨터의 IP 를 브라우저에 입력해줍니다. (예: 192.168.0.2)<br>
로컬 IP 확인 방법은 cmd에 ipconfig 치시면 됩니다.<br>
접속이 안될 시 컴퓨터와 핸드폰이 같은 네트웨크(또는 와이파이)에 연결되 있는지 확인 해보세요.<br>

다른 웹서버에 설치 하셨을 경우, 그 서버의 외부 IP를 대신 이용하시면 됩니다.<br>
예) 노트북, 컴퓨터(재생용) - http://123.123.123.123/player.php<br>
    핸드폰(리모컨) - http://123.123.123.123/<br>

# 주의 사항
1. 크롬은 자동재생이 안되기 떄문에 파이어폭스를 권장 드립니다.
2. 유튜브 embed API 특성상 일부 저작권 콘텐츠는 재생이 안되는 관계로 따로 영상을 새탭에서 트셔야 합니다.
3. 작동이 안되면 console.google.com 에서 프로젝트에 유튜브 API 가 활설화 되어 있는지, 또는 API 키가 정확한 지 확인 해보시길 바랍니다.
