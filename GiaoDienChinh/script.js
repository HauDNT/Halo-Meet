const vm = new Vue({
    el: '#app',
    data: {
        // vueMessage: "Vue says: Hello"
        userToken: '',
        roomToken: '',
        roomId: '',
        room: undefined,
        client: undefined
    },
    mounted() {
        api.setRestToken()
    },
    methods: {
        // Tạo hàm login:
        login: function() {
            return new Promise(async(resolve) => {
                const userId = (Math.random() * 10000).toFixed(0)
                const userToken = await api.getUserToken(userId)
                this.userToken = userToken
    
                const client = new StringeeClient();
                client.on('authen', (result) => {
                    console.log('on authen', result)
                    resolve(result)
                })
                client.connect(userToken)
                this.client = client
            })
        },

        // Hàm xử lý sự kiện click vào nút "New Room"
        createRoom: async function() {
            // console.log('create room')
            const room = await api.createRoom()
            const roomToken = await api.getRoomToken(room.roomId)

            this.roomId = room.roomId
            this.roomToken = roomToken
        },

        // Hàm xử lý sự kiện click vào nút "Join"
        joinRoom: async function() {
            // console.log('join!')
            const roomId = prompt('Hãy đưa room id của bạn vào đây!')
            if (!roomId) {
                return
            }

            const roomToken = await api.getRoomToken(roomId)
            this.roomId = roomId
            this.roomToken = roomToken
        }
    },
})