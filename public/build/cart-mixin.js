(window.webpackJsonp=window.webpackJsonp||[]).push([["cart-mixin"],{cKnJ:function(t,n,o){(function(t){t(document).ready((function(){t(".add-to-cart").on("click",(function(n){$button=t(n.currentTarget),t.ajax({url:$button.data("url"),method:"POST",success:function(t,n){location.reload()}})})),t(".remove-from-cart").on("click",(function(n){$button=t(n.currentTarget),t.ajax({url:$button.data("url"),method:"POST",success:function(t,n){location.reload()}})})),t("#pay_invoice").on("click",(function(n){$button=t(n.currentTarget),t.ajax({url:$button.data("url"),method:"POST",success:function(t,n){alert("Paid Invoice Successfully!"),location.reload()}})})),t("#reset_invoice").on("click",(function(n){$button=t(n.currentTarget),t.ajax({url:$button.data("url"),method:"POST",success:function(t,n){location.reload()}})}))}))}).call(this,o("EVdn"))}},[["cKnJ","runtime",0]]]);