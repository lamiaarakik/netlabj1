@extends('layout.master')
@section('content')

<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p>To make your dashboard sidebar fixed, please go to <code>gleek.js</code> file and make sure <code>sidebarPosition: "fixed"</code> </p>
<pre>
    <code class="javascript">
import getpass
import sys
import telnetlib
import requests
response=requests.get('http://localhost:8000/api/posts')
json_response=response.json()
rep=json_response["data"]
ip_address=rep["ip_adress"]
HOST=ip_address
user=rep["name"]
password=rep["password"]
ad_loopback=rep["loopback_adress"]

tn=telnetlib.Telnet(HOST)
tn.read_until(b"Username: ")
tn.write(user.encode("ascii") + b"\n")
if password:
  tn.read_until(b"Password:")
  tn.write(password.encode("ascii") + b"\n")
tn.write("enable\n")
tn.write(password.encode("ascii") + b"\n")
tn.write("conf t\n")
tn.write("int loopback1\n")
tn.write("ip address "+ad_loopback.encode("ascii")+ b" 255.255.255.255\n")
tn.write("end\n")
tn.write("exit\n")
print(tn.read_all())
    </code>
</pre>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <script src="js/plugins/highlightjs/highlight.pack.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
@endsection
