
<div id="loadingPopup" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(255, 235, 240, 0.9);z-index:9999;display:flex;align-items:center;justify-content:center;">
    <div style="text-align:center;color:#a8326e;font-weight:bold;font-size:20px;">
        <div class="spinner" style="border: 5px solid #f3f3f3; border-top: 5px solid #a8326e; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin: 0 auto 15px;"></div>
        <p style="margin-top:15px;text-align:center;">Generates Accurate Marriage Matching Report !</p>
    </div>
</div>

<style>
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<script>
    setInterval(() => {
        console.log('checking report status');
    }, 5000);
</script>
