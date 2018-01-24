#!/usr/bin/env python
# -*- coding: UTF-8 -*- 
import web
render = web.template.render('www/templates')
urls = (
  '/(.*)', 'index'
)

class index:
  def GET(self, name):
    print name
    # name = 'Bob'
    web.header('Content-Type', 'text/html; charset=UTF-8')  
    return render.index('index')
    # return "Hello, World!"

if __name__ == '__main__':
  app = web.application(urls, globals())
  app.run()