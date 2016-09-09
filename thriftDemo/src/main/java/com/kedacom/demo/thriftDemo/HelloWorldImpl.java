package com.kedacom.demo.thriftDemo;
import org.apache.thrift.TException;
public class HelloWorldImpl implements HelloWorldService.Iface {

    public HelloWorldImpl() {
    }

    public String sayHello(String username) throws TException {
        // TODO Auto-generated method stub
        return "Hi," + username + " welcome,. this is Thrift demo!";
    }
}